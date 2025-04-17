<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Gregwar\Captcha\CaptchaBuilder;
use Illuminate\Support\Facades\Session;
// use Session;

class LoginController extends Controller
{
    //

    public function index(){
        return view('admin.login');
    }


    public function authenticate(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required'
        ]);

        // Check if Captcha is correct
        if ($request->input('captcha') !== Session::get('captcha')) {
            return back()->withErrors(['captcha' => 'Captcha is incorrect.']);
        }

        if ($validator->passes()) {
            if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
                
                $admin = Auth::guard('admin')->user();
                
                // Allow access if role is 2 or 3
                if ($admin->role == 2 || $admin->role == 3) {
                    return redirect()->route('admin.dashboard');
                } else {
                    Auth::guard('admin')->logout();
                    return redirect()->route('admin.login')->with('error', 'You are not authorized to access the admin panel.');
                }
            } else {
                return redirect()->route('admin.login')->with('error', 'Either Email/Password is Incorrect');
            }
        } else {
            Session::forget('captcha');
            return redirect()->route('admin.login')
                ->withErrors($validator)
                ->withInput($request->only('email'));
        }
    }


    public function generateCaptcha()
    {
        $captchaBuilder = new CaptchaBuilder;

        $captchaBuilder->setPhrase(mt_rand(1000, 9999)); 

        $captchaBuilder->build($width = 120, $height = 40, $font = null);
        
        $captchaBuilder->setMaxBehindLines(0);

        Session::put('captcha', $captchaBuilder->getPhrase());

        return response()->stream(function () use ($captchaBuilder) {
            return $captchaBuilder->output();
        }, 200, ['Content-Type' => 'image/jpeg']);
    }
}
