<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::namespace('Frontend')->group(function(){
    Route::get('/',"PortfolioController@home")->name('home');
    Route::get('/resume',"PortfolioController@resume")->name('resume');
    Route::get('/project',"PortfolioController@project")->name('project');
    Route::get('/about',"PortfolioController@about")->name('about');
    Route::get('/contact',"PortfolioController@contact")->name('contact');
    Route::post('/contact',"PortfolioController@contactMail")->name('contactEmail');
});

Route::get('/about-us',function(){
 return view('backend.email.recoveremail');
});

Route::get('admin',"AdminLoginController@adminLoginForm")->name('admin.login');
Route::post('admin',"AdminLoginController@login");
Route::get('admin/logout',"AdminLoginController@logout");
Route::post('admin/recover/password/',"AdminLoginController@recoverPasswordEmail")->name('admin.recover.password.email');
Route::get('admin/recover/password/{code}',"AdminLoginController@recoverPassword")->name('admin.recover.password');
Route::post('admin/reset/password',"AdminLoginController@resetPassword")->name('admin.reset.password');


Route::name('admin.')->prefix('admin')->middleware('auth:admin')->namespace('Admin')->group(function() {
    Route::get('/dashboard',"AdminController@dashboard")->name('dashboard'); //dashboard

    Route::get('skills', 'SkillController@index')->name('skills.index');  //skills route
    Route::get('skill', 'SkillController@create')->name('skill.create');  //skills route
    Route::post('skill', 'SkillController@store')->name('skill.store');  //skills route
    Route::get('skills/{skill}', 'SkillController@edit')->name('skill.edit');  //skills route
    Route::put('skills/{skill}', 'SkillController@update')->name('skill.update');  //skills route
    Route::delete('skill/{skill}/delete', 'SkillController@destroy')->name('skill.delete');  //skills route


    Route::resource('summary', 'SummaryController'); //summary route
    Route::delete('summary/{summary}/delete', 'SummaryController@destroy')->name('summary.delete');
    Route::resource('project', 'ProjectController');
    Route::delete('project/{project}/delete', 'ProjectController@destroy')->name('project.delete');

    Route::match(['get','post'],'/profile', 'ProfileController@profile')->name('profile'); //profile
    Route::match(['post','get'],'/facebook-link','LinkController@facebook')->name('facebook');

    Route::match(['post','get'],'/github-link','LinkController@github')->name('github');

    Route::match(['post','get'],'/linkedin-link','LinkController@linkedin')->name('linkedin');

    Route::match(['get','post'],'/twitter-link','LinkController@twitter')->name('twitter');


    //admin settings
    Route::get('settings','AdminController@settings')->name('settings');


    ///ceck-pwd
    Route::post('check-pwd','AdminController@checkPassword');
    Route::post('update-pwd','AdminController@updatePassword');

});

Auth::routes();

// Route::get('/home', 'HomeController@index');
