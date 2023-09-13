<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Service\Order\OrderServiceInterface;
use App\Service\Product\ProductServiceInterface;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Utilities\Constant;

class HomeController extends Controller
{
    private $userService;
    private $orderService;
    private $productService;

    public function __construct(UserServiceInterface $userService, OrderServiceInterface $orderService, ProductServiceInterface $productService)
    {
        $this -> userService = $userService;
        $this -> orderService =$orderService;
        $this -> productService = $productService;
    }

    public function __invoke()
    {
       
    }

    public function index(){
        $users = $this -> userService -> all();
        $orders = $this -> orderService-> all();
        $products = $this -> productService -> all();
        return view('backend.index',compact('users','orders','products'));
    }

    public function getLogin(){
        return view('backend.login');
    }

    public function postLogin(Request $request){
        $credentials = [
            'email' => $request -> email,
            'password' => $request -> password,
            'level' => [Constant::user_level_host,Constant::user_level_admin] //tai khoan admin
        ];

        $remember = $request -> remember;

        if(Auth::attempt($credentials, $remember)){
            return redirect() -> intended('admin');
        } else {
            return back() -> with('notification', "Email hoặc mật khẩu không chính xác!!!");
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('admin/login');
    }
}
