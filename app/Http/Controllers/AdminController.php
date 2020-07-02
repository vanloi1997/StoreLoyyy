<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\User;
use Illuminate\Support\Facades\Hash;

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
    public function settings(){
        return view('admin.settings');
    }
    public function chkPassword(Request $request){
        $data = $request->all();
        $current_password = $data['current_pwd'];
        $check_password = User::where(['admin' => '1'])->first();
        if(Hash::check($current_password,$check_password->password)){
            echo "true" ; die;
        }else{
            echo "false" ; die;
        }

    }
    public function updatePassword(Request $request){
        if($request->isMethod('POST')){
            $data = $request ->all();
            $check_password = User::where(['email' => Auth::user()->email])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password,$check_password->password)){
                $password = bcrypt($data['new_pwd']);
                User::where('id','1')->update(['password' =>$password]);
                return redirect('/admin')->with('flash_message_success','Cập Nhật Mật Khẩu Thành Công');
            }else{
                return redirect('/admin/settings')->with('flash_message_error','Cập Nhật Mật Khẩu Không Thành Công');
            }
        }
    }
    public function logout(){
        Session::flush();
        return redirect('/admin')->with('flash_message_success','Đăng Xuất Thành Công');
    }
}
