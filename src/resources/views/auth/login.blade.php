   @extends('layouts.app')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
   @endsection
    
   @section('login')
    <a class="header-login"href="/">login</a>
   @endsection

   @section('content')
   <div class="contact-form">
            <div class="login">
                    <div class="login-title">
                         <h2>Login</h2>
                    </div>
                    <div class="login-content">
                        <form class="login-content__inner" method="POST" action="{{route('login')}}">
                        @csrf
                            <div class="login-content__item">
                            <p>メールアドレス</p>
                            <input class="login-content__input" type="email" name="email" placeholder="例:test@example.com" vaule="{{old('email')}}">
                            @error('email')
                            <div class="login-error">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="login-content__item">
                            <p>パスワード</p>
                            <input class="register-content__input" type="password"name="password" placeholder="例:coachtech1106" vaule="{{old('password')}}">
                            @error('password')
                            <div class="login-error">{{$message}}</div>
                            @enderror
                            </div>
                        <button class="submit-button">ログイン</button>
                    </div>
                </form>
            </div>
        </div>
   @endsection