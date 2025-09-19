   @extends('layouts.app')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
   @endsection

   @section('content')
   <div class="contact-form">
    <div class="contact-title">
        <h2>Contact</h2>
    </div>
    <form class="contact-table" method="POST" action="{{route('contact.confirm')}}">
        @csrf
    <table class="contact-content">
        <tr class="contact-item">
            <th class="content-title">お名前<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input--name" type="name" name="first_name" placeholder="例:山田">
                @error('first_name')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                <input class="contact-content__input--name" type="name" name="last_name" placeholder="例:太郎">
                @error('last_name')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">性別<span class="content-title__red">※</span></th>
            <td>
                <label for="male">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="male">男性
                    </select>
                </label>
                <label for="female">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="female">女性
                    </select>
                </label>
                <label for="other">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="other">その他
                    </select>
                </label>
                @error('gender')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">メールアドレス<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input--address" type="email" name="email" placeholder="例:test@example.com">
                @error('email')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">電話番号<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input--tel" type="tel" name="tel1" placeholder="080">
                <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel2" placeholder="1234">
            <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel3" placeholder="5678">
            @error('tel')
                <div class="contact-form-error">{{$message}}</div>
             @enderror
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">住所<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input--address" type="text" name="address" placeholder="例:東京都渋谷区千駄ヵ谷1-2-3">
                @error('address')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">建物名</th>
            <td>
                <input class="contact-content__input--address" type="text" name="building" placeholder="例:千駄ヵ谷マンション101">
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせの種類<span class="content-title__red">※</span></th>
            <td>
                <select class="contact-content__select" name="department" id="department">
                    <option class="contact-content__select--option" value="">選択してください</option>
                    <option class="contact-content__select--option" value="1">1.商品のお届けについて</option>
                    <option class="contact-content__select--option" value="2">2.商品の交換について</option>
                    <option class="contact-content__select--option" value="3">3.商品トラブル</option>
                    <option class="contact-content__select--option" value="4">4.ショップへのお問い合わせ</option>
                    <option class="contact-content__select--option" value="5">5.その他</option>
                </select>
                @error('department')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせ内容<span class="content-title__red">※</span></th>
            <td>
                <textarea class="contact-content__textarea" name="message" rows="3" cols="40" id="text" placeholder="お問い合わせ内容を後ご記載ください">{{old('message')}}</textarea>
                @error('message')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
    </table>
    <button type="submit" class="submit-button">確認画面</button>
    </form>
   </div>
@endsection