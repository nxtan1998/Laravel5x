<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;

class Admincontroller extends Controller
{
    public function listuser(Request $req)
    {
    	$user=User::all();
    	return view('admin.user.danhsach',compact('user'));
    }
    public function getaddlist(Request $req)
    {
    	return view('admin.user.them');
    }
    public function postaddlist(Request $req)
    {
    	        $validate=$req->validate(
            [
                'email'=>'required|email|unique:users,email',
                'password'=>'required|min:6|max:20',
                 'name'=>'required',
                 'address'=>'required',
                 're_password'=>'required|same:password'
            ],
            [

                'email.required'=>'vui lòng nhập email',
                'email.email'=>'không đúng',
                'email.unique'=>'đã có người sử dụng email này',
                'password.required'=>'vui lòng nhập mật khẩu',
                're_password'=>'Mật khẩu không giống nhau',
                'password.min'=>'mật khẩu chứa ít nhất 6 kí tự'
            ]
        );
        $user=new User();
        $user->full_name=$req->name;
        $user->email=$req->email;
        $user->password=Hash::make($req->password);
        $user->phone=$req->phone;
        $user->address=$req->address;
        $user->save();
        return redirect()->back()->with('thanhcong','tạo tài khoản thành công');
    }

}
