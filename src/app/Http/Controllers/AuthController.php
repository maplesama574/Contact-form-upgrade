<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        //処理
    }
    public function showRegisterForm()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $request->validate(
            [
                'name'=> 'required|string|max:255', 
                'email'=>'required|email|unique:users,email', 
                'password'=>'required|string|min:8',
            ]
            );
    }
}
