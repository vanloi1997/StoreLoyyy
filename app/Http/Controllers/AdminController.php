<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use Session;
class AdminController extends Controller
{
    //
    public function login(Request $request){
        if($request->isMethod('POST')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1'])){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/admin')->with('flash_message_error','Email Hoặc Mật Khẩu không đúng');
            }
        }
        return view('admin.admin_login');
    }
    public function dashboard(){
        return view('admin.dashboard');
    }
    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Đăng Xuất Thành Công');
    }
}
