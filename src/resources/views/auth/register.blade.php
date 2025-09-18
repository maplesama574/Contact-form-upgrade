<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
</head>
<body>
    <header class="header">
        <div class="header-item">
            <a class="header-logo" href="/">FashionablyLate</a>
            <a class="header-login"href="/">login</a>
        </div>
    </header>

    <main class="contact-form">
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
                        <input class="register-content__input" type="email" name="email" placeholder="例:test@example.com" vaule="{{old('name')}}">
                        @error('email')
                        <div class="register-error">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="register-content__item">
                        <p>パスワード</p>
                        <input class="register-content__input" type="password"name="password" placeholder="例:coachtech1106" vaule="{{old('name')}}">
                        @error('password')
                        <div class="register-error">{{$message}}</div>
                        @enderror
                    </div>
                    <button class="submit-button">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>