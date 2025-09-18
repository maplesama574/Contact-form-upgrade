   @extends('layouts.app')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
   @endsection

   @section('content')

   <div class="contact-form">
    <div class="contact-title">
        <h2>Contact</h2>
    </div>
    <form class="contact-table" method="POST" action="{{route('index')}}">
        @csrf
    <table class="contact-content">
        <tr class="contact-item">
            <th class="content-title">お名前<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input" type="text" name="text" placeholder="例:山田">
            </td>
            <td>
                <input class="contact-content__input" type="text" name="text" placeholder="例:太郎">
            </td>
        </tr>
        <tr class="content-title">
            <th class="content-title">性別<span class="content-title__red">※</span></th>
            <td>
                <label for="gender">
                    <input type="radio" name="gender" value="male">男性
                    </select>
                </label>
                <label for="gender">
                    <input type="radio" name="gender" value="female">女性
                    </select>
                </label>
                <label for="gender">
                    <input type="radio" name="gender" value="other">その他
                    </select>
                </label>
            </td>
        </tr>
        <tr>
            <th class="content-title">メールアドレス<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input" type="email" name="email" placeholder="例:test@example.com">
            </td> 
        </tr>
        <tr>
            <th class="content-title">電話番号<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input" type="tel" name="tel" placeholder="080">
            </td>
            <td>
                <input class="contact-content__input" type="tel" name="tel" placeholder="1234">
            </td>  
            <td>
                <input class="contact-content__input" type="tel" name="tel" placeholder="5678">
            </td> 
        </tr>
        <tr class="contact-item">
            <th class="content-title">住所<span class="content-title__red">※</span></th>
            <td>
                <input class="contact-content__input" type="adress" name="adress" placeholder="例:東京都渋谷区千駄ヵ谷1-2-3">
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">建物名</th>
            <td>
                <input class="contact-content__input" type="adress" name="adress" placeholder="例:千駄ヵ谷マンション101">
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせの種類<span class="content-title__red">※</span></th>
            <td>
                <select name="department" id="/">
                    <option value="">選択してください</option>
                    <option value="1">1.商品のお届けについて</option>
                    <option value="2">2.商品の交換について</option>
                    <option value="3">3.商品トラブル</option>
                    <option value="4">4.ショップへのお問い合わせ</option>
                    <option value="5">5.その他</option>
                </select>
            </td>
        </tr>
        <tr class="contact-item">
            <th class="content-title">お問い合わせ内容<span class="content-title__red">※</span></</th>
            <td>
                <textarea name="message" rows="3" cols="40" id="text" placeholder="お問い合わせ内容を後ご記載ください">{{old('message')}}</textarea>
            </td>
        </tr>
    </table>
    </form>
    <button class="submit-button">確認画面</button>
   </div>