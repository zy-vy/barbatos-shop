<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    //

    public function login(Request $request)
    {
        
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email is required',
            'password.required' => 'Password is required'
        ]);
        $cred = [
            'email' => $request->email,
            'password' => $request->password
        ];
        if ($request->remember) {
            Cookie::queue('user_cookie', $request->email, 2000);
        }

        if (Auth::attempt($cred, true)) {
            Session::put('user_session', $cred);
            return redirect('/');
        }
        return redirect()->back()->withErrors('Wrong email or password');
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }

    public function registerPage(Request $req){
        return view('register');
    }

    public function register(Request $request)
    {
        
        $validate = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|same:con-pass',
            'con-pass' => 'required',
            'gender' => 'required',
            'dob' => 'required|date|before:today|after:01/01/1900',
            'country' =>'required|not_in:Choose a Country'
        ], [
            'name' => 'Name is required (min. 5 character)',
            'email.required' => 'Email is required',
            'password.required' => 'Password is required',
            'gender' => 'Gender is required',
            'dob' => 'Date of Birth must be before today and after 01-01-1900',
            'country' =>'Country is required'
        ]);
        
        $validate['password'] = bcrypt($validate['password']);
        // return dd($validate);
        
        User::create($validate);
        return redirect('/login')->with('message','Success registration');
        return redirect()->back()->withErrors('Failed Registration');
    }

    public function adminPage(Request $req){
        return view ('admin');
    }
}
