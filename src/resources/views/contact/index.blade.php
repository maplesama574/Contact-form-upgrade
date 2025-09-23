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
                <div class="contact-content__input--wrap-name">
                <div class="contact-content__input--item">
                <input class="contact-content__input--name" type="name" name="first_name" value="{{ old('first_name') }}" placeholder="例:山田">
                @error('first_name')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
                <div class="contact-content__input--item">
                <input class="contact-content__input--name" type="name" name="last_name" value="{{ old('last_name') }}" placeholder="例:太郎">
                @error('last_name')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
            </div>
            </td>
        </tr>
        <tr class="contact-item gender">
            <th class="content-title">性別<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--gender-wrap">
                <label for="male">
                    <input type="radio" name="gender" value="male" {{ old('gender')=='male' ? 'checked' : '' }}>男性
                </label>
                <label for="female">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="female" {{ old('gender')=='female' ? 'checked' : '' }}>女性
                </label>
                <label for="other">
                    <input class="contact-content__input--radio" type="radio" name="gender" value="other" {{ old('gender')=='other' ? 'checked' : '' }}>その他
                </label>
                </div>
                @error('gender')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">メールアドレス<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <input class="contact-content__input--address" type="email" name="email" value="{{ old('email') }}" placeholder="例:test@example.com">
                @error('email')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">電話番号<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--tel-wrap">
                <input class="contact-content__input--tel" type="tel" name="tel1" value="{{ old('tel1') }}" placeholder="080">
                    <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel2" value="{{ old('tel2') }}" placeholder="1234">
                    <span>-</span>
                <input class="contact-content__input--tel" type="tel" name="tel3" value="{{ old('tel3') }}" placeholder="5678">
                </div>
                @error('tel')
                <div class="contact-form-error">{{$message}}</div>
                @enderror
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">住所<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <input class="contact-content__input--address" type="text" name="address" value="{{ old('address') }}" placeholder="例:東京都渋谷区千駄ヵ谷1-2-3">
                @error('address')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">建物名</th>
            <td>
                <input class="contact-content__input--address" type="text" name="building" value="{{ old('building') }}" placeholder="例:千駄ヵ谷マンション101">
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせの種類<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <select class="contact-content__select" name="department" id="department">
                    <option class="contact-content__select--option" value="">選択してください</option>
                    <option class="contact-content__select--option" value="1.商品のお届けについて" {{ old('department')=='1.商品のお届けについて' ? 'selected' : '' }}>1.商品のお届けについて</option>
                    <option class="contact-content__select--option" value="2.商品の交換について" {{ old('department')=='2.商品の交換について' ? 'selected' : '' }}>2.商品の交換について</option>
                    <option class="contact-content__select--option" value="3.商品トラブル" {{ old('department')=='3.商品トラブル' ? 'selected' : '' }}>3.商品トラブル</option>
                    <option class="contact-content__select--option" value="4.ショップへのお問い合わせ" {{ old('department')=='4.ショップへのお問い合わせ' ? 'selected' : '' }}>4.ショップへのお問い合わせ</option>
                    <option class="contact-content__select--option" value="5.その他" {{ old('department')=='5.その他' ? 'selected' : '' }}>5.その他</option>
                </select>
                @error('department')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせ内容<span class="content-title__red">※</span></th>
            <td>
                <div class="contact-content__input--wrap">
                <textarea class="contact-content__textarea" name="message" rows="3" cols="40" id="text" placeholder="お問い合わせ内容を後ご記載ください">{{old('message')}}</textarea>
                @error('message')
                    <div class="contact-form-error">{{$message}}</div>
                @enderror
                </div>
            </td>
        </tr>
    </table>
    <button type="submit" class="submit-button">確認画面</button>
    </form>
   </div>
@endsection