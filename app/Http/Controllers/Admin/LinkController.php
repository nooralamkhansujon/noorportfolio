<?php

namespace App\Http\Controllers\Admin;

use App\Facebook;
use App\LinkedIn;
use App\Github;
use App\Twitter;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class LinkController extends Controller
{

    public function facebook(Request $request){
         $facebook = Facebook::first();
         if($facebook == null){
             $facebook = new Facebook();
         }
        if($request->isMethod('post')){
            $request->validate([
                'url'    => 'required|url|active_url',
            ]);
            $facebook->url = $request->url;
            $facebook->save();
            $this->setSuccess("Facebook Link updated successfully");
        }
        return view('backend.links.facebook',compact('facebook'));
    }

    public function github(Request $request){
        $github = Github::first();
        if($github == null){
             $github = new Github();
        }
        if($request->isMethod('post')){
            $request->validate([
                'url'    => 'required|url|active_url',
            ]);

            $github->url = $request->url;
            $github->save();
            $this->setSuccess("Github Link updated successfully");
        }
        return view('backend.links.github',compact('github'));
    }

    public function linkedin(Request $request){
        $linkedin = LinkedIn::first();
        if($linkedin == null){
             $linkedin = new LinkedIn();
        }
        if($request->isMethod('post')){
            $request->validate([
                'url'    => 'required|url|active_url',
            ]);

            $linkedin->url = $request->url;
            $linkedin->save();
            $this->setSuccess("LinkedIn Link updated successfully");
        }
        return view('backend.links.linkedin',compact('linkedin'));
    }
    public function twitter(Request $request){
        $twitter = Twitter::first();
        if($twitter == null){
            $twitter = new Twitter();
        }
        if($request->isMethod('post')){
            $request->validate([
                'url'    => 'required|url|active_url',
            ]);

            $twitter->url = $request->url;
            $twitter->save();
            $this->setSuccess("Twitter Link updated successfully");
        }
        return view('backend.links.twitter',compact('twitter'));
    }


}
