<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name'=> 'required|string|max:255', 
            'email'=>'required|email|unique:users,email', 
            'password'=>'required|string|min:8',
        ], 
        [
            'name.required'=> 'お名前を入力してください', 
            'email.required'=>'メールアドレスを入力してください', 
            'email.email'=>'メールアドレスは「ユーザー名@ドメイン」形式で入力してください', 
            'password.required'=>'パスワードを入力してください',
        ]
    );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->intended('admin/dashboard');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'required|email', 
            'password'=>'required|string|min:8',
        ],
            [
            'email.required'=>'メールアドレスを入力してください', 
            'email.email'=>'メールアドレスは「ユーザー名@ドメイン」形式で入力してください', 
            'password.required'=>'パスワードを入力してください',
        ]);


        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect()->intended($request->input('redirect_to') ?? '/');
        }
}

}
