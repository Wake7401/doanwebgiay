<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\User\UserServiceInterface;
use App\Utilities\Constant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{   
    private $userService;
    private $orderService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService)
    {
        $this -> userService = $userService;
        $this -> orderService = $orderService;
    }

    public function login(){
        return view('frontend.account.login');
    }

    public function checkLogin(Request $request){
        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password,
            'level' => Constant::user_level_client, //tai khoan khach
        ];

        $remember = $request -> remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect() -> intended('');
        } else {
            return back() -> with('notification', "Email hoặc mật khẩu không chính xác!!!");
        }
    }

    public function register(){
        return view('frontend.account.register');
    }

    public function postRegister(Request $request){
        if($request->password != $request->password_confirmation){
            return back()->with('notification', 'Password không trùng khớp');
        }
    
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encrypt password
            'level' => Constant::user_level_client,
        ];

        $user = $this->userService->create($data);
        if (!$user) {
            return back()->with('notification', 'Đăng kí thất bại');
        }
        return redirect('account/login')-> with('notification', 'Đăng kí thành công !!! Vui lòng đăng nhập !!!');
    }

    public function logout(){
        Auth::logout();
        return back();
    }

    public function myOrderIndex(){
        $orders = $this -> orderService-> getOrderByUserId(Auth::id());

        return view('frontend.account.my-order.index',compact('orders'));
    }

    public function myOrderShow($id){
        $order = $this -> orderService -> find($id);

        return view('frontend.account.my-order.show',compact('order'));
    }
}
