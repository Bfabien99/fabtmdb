<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    //
    public function login(){
        $auth = request()->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if(!auth()->attempt($auth)){
            return back()->withInput()->with('error', 'invalid credentials!');
        }
        return redirect('/');
    }

    public function register(){
        $register = request()->validate([
            'email' => 'required|email',
            'name' => 'required|min:3',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required',
        ]);
        $register['password'] = bcrypt($register['password']);
        $user = User::create($register);
        auth()->login($user);
        return redirect('/');
    }

    public function logout(){
        auth()->logout();
        return redirect('/');
    }
}
