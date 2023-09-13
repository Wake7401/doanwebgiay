<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Service\User\UserServiceInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $userService;
    public function __construct(UserServiceInterface $userService)
    { 
      $this -> userService = $userService;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this -> userService ->all();

        return view('backend.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request -> get('password') != $request -> get('password_confirmation')){
            return back() -> with('notification','Mật khẩu không trùng khớp');
        }
        $data = $request -> all();
        $data['password'] = bcrypt($request -> get('password'));

        // Handle file upload
        if ($request->hasFile('avatar')) {
            try {
                $image = $request->file('avatar');
                $new_image = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('frontend/img/user'), $new_image);
                $data['avatar'] = $new_image;
            } catch (\Exception $e) {
                return back()->with('notification', 'Đã có lỗi xảy ra khi tải lên hình ảnh: ' . $e->getMessage());
            }
        }

        $user = $this -> userService -> create($data);
        return redirect('admin/user/'. $user-> id);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('backend.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit( User $user)
    {
        return view('backend.user.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request -> all();
        if($request -> get('password') != null){
            if($request -> get('password') != $request -> get('password_confirmation')){
                return back() -> with('notification','Mật khẩu không trùng khớp');
            }
            $data['password'] = bcrypt($request-> get('password'));
        } else{
            unset($data['password']);
        }

        // Handle file upload
        if ($request->hasFile('avatar')) {
            try {
                $image = $request->file('avatar');
                $new_image = uniqid() . '_' . $image->getClientOriginalName();
                $image->move(public_path('frontend/img/user'), $new_image);
        
                if (!empty($data['avatar'])) {
                    $old_image_path = public_path('frontend/img/user/' . $data['avatar']);
                    if (file_exists($old_image_path)) {
                        unlink($old_image_path);
                    }
                }
        
                $data['avatar'] = $new_image;
            } catch (\Exception $e) {
                return back()->with('notification', 'Đã có lỗi xảy ra khi tải lên hình ảnh: ' . $e->getMessage());
            }
        }   
        $this -> userService ->update($data, $user -> id);
        return redirect('admin/user/'.$user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this -> userService ->delete($user -> id);
        if (!empty($user->avatar)) {
            $old_image_path = public_path('frontend/img/user/' . $user->avatar);
            if (file_exists($old_image_path)) {
                unlink($old_image_path);
            }
        }

        return redirect('admin/user');
    }
}
