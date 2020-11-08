<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Profile;
use App\Facebook;
use App\Github;
use App\LinkedIn;
use App\Project;
use App\Skill;
use App\Summary;
use App\Twitter;
use App\Mail\UserMessageMail;

class PortfolioController extends Controller
{

    public function __construct()
    {

    }

    public function home(){
       $profileDetails  = Profile::first();
       $facebook  = Facebook::first();
       $linkedIn  = LinkedIn::first();
       $projects  = Project::limit(3)->get();
       $skills    = Skill::latest()->limit(14)->get();
       return view('frontend.home',compact('profileDetails','facebook','linkedIn','projects','skills'));
    }

    public function resume(){
        $profileDetails  = Profile::first();
        $facebook        = Facebook::first();
        $linkedIn        = LinkedIn::first();
        $github          = Github::first();
        $twitter         = Twitter::first();
        $projects        = Project::all();
        $skills          = Skill::where('status',1)->limit(14)->get();
        $summeries       = Summary::latest()->limit(12)->get();
       return view('frontend.resume',compact('summeries','profileDetails','facebook','twitter','github','linkedIn','projects','skills'));
    }


    public function project(){
        $projects  = Project::all();

        return view('frontend.project',compact('projects'));

    }

    public function about(){
        $profileDetails  = Profile::first();
        $skills          = Skill::limit(14)->get();
        return view('frontend.about',compact('profileDetails','skills'));
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function contactMail(Request $request){
        if($request->isMethod('post')){
            $request->validate([
                'name'    =>'required|alpha|max:20',
                'email'   => 'required|email',
                'subject' =>'required|string',
            ]);
            $data = $request->all();

            ///Send Confirmation Email
            $email       = env('MAIL_USERNAME','nooralamkhansujon@gmail.com');
            $messageData =(object) [
                'email'    => $data['email'],
                'name'     => $data['name'],
                'subject'  => $data['subject'],
                'comment'  => $data['message']
            ];
            // dd($messageData);

            Mail::to($email)->send(new UserMessageMail($messageData));
            $this->setSuccess('Thanks for contact with us.');
    		return redirect()->back();
    	}
    }
}

