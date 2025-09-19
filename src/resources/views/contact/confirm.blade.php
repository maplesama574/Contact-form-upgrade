   @extends('layouts.app')
   @section('css')
   <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
   @endsection

   @section('content')
   <div class="confirm-form">
    <div class="confirm-title">
        <h2>Confirm</h2>
    </div>
    <form class="confirm-table" method="POST" action="{{route('contact.submit')}}">
        @csrf
            <table class="confirm-content">
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お名前
                </th>
                <td class="confirm-content__item">{{$validated['first_name']}}{{$validated['last_name']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    性別
                </th>
                <td class="confirm-content__item">
                    @if($validated['gender']=='male')男性
                    @elseif($validated['gender']=='female')女性
                    @else その他
                    @endif
                </td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    メールアドレス
                </th>
                <td class="confirm-content__item">{{$validated['email']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    電話番号
                </th>
                <td class="confirm-content__item">{{$validated['tel1']}}{{$validated['tel2']}}{{$validated['tel3']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    住所
                </th>
                <td class="confirm-content__item">{{$validated['address']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    建物名
                </th>
                <td class="confirm-content__item">{{$validated['building']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お問い合わせの種類
                </th>
                <td class="confirm-content__item">{{$validated['department']}}</td>
                </tr>
                <tr class="confirm-item">
                    <th class="confirm-header">
                    お問い合わせ内容
                </th>
                <td class="confirm-content__item">{{$validated['message']}}</td>
                </tr>
            </table>
            <div class="confirm-submit">
                <button type="submit" class="submit-button">送信</button>
                <a class="cancel-button" href="{{route('contact.index')}}">修正</a>
            </div>
        </form>
   @endsection