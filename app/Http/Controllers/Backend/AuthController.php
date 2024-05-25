<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=> 'required',
            'password'=> 'required'
           ]);

           if(\Auth::attempt($request->only('email','password'))){
            return redirect('admin/home');
           }

           return redirect('admin/login')->withError('Login Details are not Valid...');

    }

    public function register_view()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required | unique:users',
            'password'=> 'required | min :6 | confirmed' 
           ]);

       User::create([
        'name'=>$request->name,
        'email'=>$request->email,
        'password'=>\Hash::make($request->password)
       ]);    

       return redirect()->back()->with('success', 'Admin Record has been created....');   
    }

    public function home()
    {
        return view('admin.dashboard');
    }

    public function logout()
    {
        \Session::flush();
        \Auth::logout();
        return redirect('admin/login');
    }
}
