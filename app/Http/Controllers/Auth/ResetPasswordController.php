<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Auth;
use App\Home_setting;
use App\Setting;
use App\News;
use App\Page;
use Illuminate\Http\Request;
class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    protected $redirectTo = '/';
    
    public function __construct()
    {
        $this->middleware('guest');
    }
    
      public function showResetForm(Request $request, $token = null)
    {
        $home_setting = Home_setting::find(1);
        $setting = Setting::find(1);
        $about_us = Page::find(1);
        $fnews = News::orderby('id', 'desc')->paginate(2);
        return view('auth.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email,'home_setting'=>$home_setting,
              'setting'=>$setting,'about_us'=>$about_us,'fnews'=>$fnews  
                ]
        );
    }
    
}
