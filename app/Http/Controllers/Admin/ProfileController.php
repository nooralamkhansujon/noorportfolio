<?php

namespace App\Http\Controllers\Admin;

use App\Profile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        $profileDetails = Profile::first();

        if($profileDetails == null){
            $profileDetails = new Profile();
        }

        if($request->isMethod('post')){
            $data = $request->all();
            $request->validate([
                'name'         => 'required',
                'about_more'   => 'required',
                'about_sm'     => 'required',
                'job_title'    => 'required'
            ]);

    		$profileDetails->name          = $data['name'];
            $profileDetails->about_sm      = $data['about_sm'];
            $profileDetails->about_more    = $data['about_more'];
            $profileDetails->job_title     = $data['job_title'];

    		// Upload Image
    		if($request->hasFile('avater_sm')){
    			$image_tmp = $request->avater_sm;
    			if($image_tmp->isValid()){
    				$extension         = $image_tmp->getClientOriginalExtension();
    				$filename          = "profile_sm".rand(111,99999).'.'.$extension;
    				$image_path        = public_path('images/'.$filename);
    				Image::make($image_tmp)->resize(200,200)->save($image_path);

    				// Store image name in profiles table
    				$profileDetails->avater_sm = $filename;
    			}
            }
    		// Upload Image
    		if($request->hasFile('avater_lg')){
    			$image_tmp = $request->avater_lg;
    			if($image_tmp->isValid()){
    				$extension         = $image_tmp->getClientOriginalExtension();
    				$filename          = 'profile_lg'.rand(111,99999).'.'.$extension;
    				$image_path        = public_path('images/'.$filename);
    				Image::make($image_tmp)->resize(570,500)->save($image_path);

    				// Store image name in profiles table
    				$profileDetails->avater_lg = $filename;
    			}
            }

            //save profile in database
    		$profileDetails->save();
            return redirect(route('admin.profile'))->with('flash_message_success','profile has been Updated successfully!');
        }

        return view('backend.profile.profileList',compact('profileDetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $profile_total = Profile::all()->count();
         if($profile_total < 1 ){
            return view('backend.profile.AddProfile');
         }
         $this->setError("Profile Item already exist. You can't create new one");
         return redirect(route('admin.profile.index'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:80',
            'avater_sm'  => 'required|image|mimes:jpeg,jpg,png',
            'avater_lg'  => 'required|image|mimes:jpeg,jpg',
            'about_sm'   => 'required|max:400|string',
            'about_more' => 'required|string',
            'job_title'  => 'required|string|max:150',

        ]);

        if ($validator->fails()) {
            return redirect(route('admin.profile.create'))
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        //store image in public disk
        $avater_sm    = $this->makeImage('profile','alam',$request->avater_sm,200,200);
        $avater_lg    = $this->makeImage('profile','noor',$request->avater_lg,500,500);

        //Store data in profile table
        $data    = $this->profileRequestData($request,$avater_sm,$avater_lg);
        $profile = Profile::create($data);

        if(!$profile)
        {
            $this->setError('Error! Profile not created!');
            return redirect(route('admin.profile.create'));
        }

        $this->setSuccess('Profile Created successfully');
        return redirect(route('admin.profile.index'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Profile $profile)
    {
        return view('backend.profile.AddProfile',compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profile $profile)
    {
        $validator = Validator::make($request->all(), [
            'name'       => 'required|max:80',
            'about_sm'   => 'required|max:400|string',
            'about_more' => 'required|string',
            'job_title'  => 'required|string|max:150',

        ]);

        if ($validator->fails()) {
            return redirect(route('admin.profile.edit',$profile))
                        ->withErrors($validator);
        }

        $avater_sm  = $profile->avater_sm;
        $avater_lg  = $profile->avater_lg;

        //check if avater sm has image
        if ($request->hasFile('avater_sm')) {

            //delete previouse image from the file
            if(file_exists(public_path('storage/'.$avater_lg))){
                Storage::disk('public')->delete($avater_sm);
            }
            $avater_sm  = $this->makeImage('profile','alam',$request->avater_sm,200,200);
        }
        //check if avater large has image
        if ($request->hasFile('avater_lg')) {

            //delete previouse image from the file
            if(file_exists(public_path('storage/'.$avater_lg))){
                Storage::disk('public')->delete($avater_lg);
            }
            $avater_lg  = $this->makeImage('profile','noor',$request->avater_lg,500,500);
        }

        //Store data in profile table
        $data  = $this->profileRequestData($request,$avater_sm,$avater_lg);

        if(!$profile->update($data))
        {
            $this->setError('Error! Profile not updated!');
            return redirect(route('admin.profile.index',$profile));
        }

        $this->setSuccess('Profile Updated successfully');
        return redirect()->route('admin.profile.index');
    }

    private function profileRequestData(Request $request,$avater_sm,$avater_lg){

        $data    = array(
            'name'       => $request->name,
            'avater_sm'  => $avater_sm,
            'avater_lg'  => $avater_lg,
            'about_sm'   => $request->about_sm,
            'about_more' => $request->about_more,
            'job_title'  => $request->job_title
        );
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Profile $profile)
    {
        $avater_sm = $profile->avater_sm;
        $avater_lg = $profile->avater_lg;

        if($profile->delete()){
            if(file_exists(public_path('storage/'.$avater_sm))){
                Storage::disk('public')->delete($avater_sm);
            }
            if(file_exists(public_path('storage/'.$avater_lg))){
                Storage::disk('public')->delete($avater_lg);
            }
            $this->setSuccess('Profile deleted successfully!');
            return redirect(route('admin.profile.index'));
        }
        $this->setError('Profile Not deleted!');
        return redirect(route('admin.profile.index'));

    }
}
