<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
class AdminLoginController extends Controller
{
    use AuthenticatesUsers;
    protected $redirectTo = 'admin/dashboard';

    public function __construct()
    {
       $this->middleware('guest:admin')->except('logout');
    }
    public function username(){
        return 'username';
    }

    public function adminLoginForm(){
        return view('backend.admin_login');
    }

    public function guard(){
        return Auth::guard('admin');
    }

    public function logout(Request $request){
        $this->guard()->logout();
        return redirect('admin');
    }

    public function recoverPasswordEmail(Request $request){
        $admin = Admin::where('email',$request->email)->first();
        if($admin == null){
            $this->setError("Sorry! Your Email is not Exist.Please Provide Correct Email");
           return redirect()->back();
        }

        $messageData=array('username'=>$admin->username,'email'=>$admin->email,'code'=>base64_encode($admin->email));
        $email = $admin->email;

        Mail::send('emails.recoveremail',$messageData,function($message)
        use($email){
            $message->to($email)->subject("Recover Password Link!");
        });
        $this->setSuccess("Password Reset Email has been send  successfully.please check your account!");
        return redirect()->back();
    }

    public function recoverPassword($code){
        $email = base64_decode($code);
        $admin = Admin::where('email',$email)->first();
        if($admin == null){
            $this->setError("Sorry! Something is wrong.Please try Again");
           return redirect()->route('admin.login');
        }
        return view('backend.resetPassword',compact('admin'));
    }

    public function resetPassword(Request $request){
        $request->validate([
            'email'            => 'required|email',
            'password'         => 'required|confirmed',
        ]);

        $admin = Admin::where('email',$request->email)->first();
        if($admin == null){
            $this->setError("Sorry! Something is wrong.Please try Again");
            return redirect()->route('admin.login');
        }
        $admin->password = Hash::make($request->password);
        $admin->save();
        $this->setSuccess("Your Password is Reset.You can login now");
        return redirect()->route('admin.login');
    }

}
