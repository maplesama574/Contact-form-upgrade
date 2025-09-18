   @extends('layouts.app')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
   @endsection
    
   @section('login')
    <a class="header-login"href="/">login</a>
   @endsection

   @section('content')
        <div class="contact-form">
            <div class="register">
                    <div class="register-title">
                         <h2>Register</h2>
                    </div>
                    <div class="register-content">
                        <form class="register-content__inner" method="POST" action="{{route('register')}}">
                        @csrf
                            <div class="register-content__item">
                            <p>お名前</p>
                            <input class="register-content__input" type="text" name="name" placeholder="例:山田 太郎" vaule="{{old('name')}}">
                            @error('name')
                            <div class="register-error">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="register-content__item">
                            <p>メールアドレス</p>
                            <input class="register-content__input" type="email" name="email" placeholder="例:test@example.com" vaule="{{old('email')}}">
                            @error('email')
                            <div class="register-error">{{$message}}</div>
                            @enderror
                            </div>
                            <div class="register-content__item">
                            <p>パスワード</p>
                            <input class="register-content__input" type="password"name="password" placeholder="例:coachtech1106" vaule="{{old('password')}}">
                            @error('password')
                            <div class="register-error">{{$message}}</div>
                            @enderror
                            </div>
                        <button class="submit-button">登録</button>
                    </div>
                </form>
            </div>
        </div>
@endsection