<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Admin;

class AdminController extends Controller
{

    public function dashboard(){
        return view('backend.dashboard');
    }
    public function settings(){
        return view('backend.settings');
    }



    // public function forgetPassword(Request $request){

    // }


    public function checkPassword(Request $request){

        $current_password = $request->current_pwd;
        $adminUsername    = Auth::guard('admin')->user()->username;
        $adminUser        = Admin::where(['username' =>$adminUsername])->first();
        if(Hash::check($current_password,$adminUser->password)){
            return response('true');
        }else {
            return response('false');
        }
    }
    public function updatePassword(Request $request){

        if($request->isMethod('post')){
            $data = $request->all();
            $adminUsername    = Auth::guard('admin')->user()->username;
            $adminUser        = Admin::where(['username' =>$adminUsername])->first();
            $current_password = $data['current_pwd'];
            if(Hash::check($current_password, $adminUser->password)){
                $password = bcrypt($data['new_pwd']);
                Admin::where('id',$adminUser->id)->update(['password'=>$password]);
                $this->setSuccess('Password updated Successfully!');
                return redirect(route('admin.settings'));
            }else {
                $this->setError('Current Password is  Incorrect!');
                return redirect(route('admin.settings'));
            }
        }
    }
}
