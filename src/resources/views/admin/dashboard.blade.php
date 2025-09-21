   @extends('layouts.app')
   @section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}?v={{ time() }}">

@endsection

    
   @section('login')
    <a class="header-login" href="/">login</a>
   @endsection

   @section('content')
    <div class="admin-form">
            <div class="admin">
                    <div class="admin-title">
                         <h2>Admin</h2>
                    </div>
                    <div class="admin-content">
<!--コンテンツ-->
                        <div class="search-box">
                            <form class="search-form" action="{{route('admin.search')}}" method="GET">
                                <input class="search-text" type="text" name="keyword" placeholder="名前やメールアドレスを入力してください">
                                <select class="search-gender" name="gender" id="gender">
                                    <option class="search-gender--option" value="" disabled selected>性別</option>              <option class="search-gender--option" value="全て">全て</option>
                                    <option class="search-gender--option" value="男性">男性</option>
                                    <option class="search-gender--option" value="女性">女性</option>
                                    <option class="search-gender--option" value="その他">その他</option>
                                </select>
                                <select class="search-department" name="department" id="department">
                                    <option class="search-department--option" value="" disabled selected>お問い合わせの種類</option>
                                    <option class="search-department--option" value="1.商品のお届けについて">1.商品のお届けについて</option>
                                    <option class="search-department--option" value="2.商品の交換について">2.商品の交換について</option>
                                    <option class="search-department--option" value="3.商品トラブル">3.商品トラブル</option>
                                    <option class="search-department--option" value="4.ショップへのお問い合わせ">4.ショップへのお問い合わせ</option>
                                    <option class="search-department--option" value="5.その他">5.その他</option>
                                </select>
<!--あとで消すかも↓-->
                                @php
                                    $today = date('y-m-d');
                                @endphp
                                <input class="search-date" type="date" name="date" id="date" value="{{$today}}">
                                </input>
                                <button class="submit-button">検索</button>
                                <a class="cancel-button" href="{{route('admin.dashboard')}}">リセット</a>
                            </form>
                        </div>

                        <div class="form-ex">
                        <div class="export">
                            <form action="{{route('admin.export')}}" method="GET">
                                <input type="hidden" name="name" value="{{request('name')}}">
                                <input type="hidden" name="email" value="{{request('email')}}">
                                <input type="hidden" name="gender" value="{{request('gender')}}">
                                <input type="hidden" name="department" value="{{request('department')}}">

                            <button class="export-button">エクスポート</button>
                            </form>
                        </div>
<!--何個あるのか-->
                        <div class="pagination">
                            {{$contacts->appends(request()->query())->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                    </div>
<!--お問い合わせテーブル-->
                    <div class="admin-table">
                        <table class="admin-table-content">
                            <tr class="admin-table-header">
                                <th class="admin-table-header__detail">お名前</th>
                                <th class="admin-table-header__detail">性別</th>
                                <th class="admin-table-header__detail">メールアドレス</th>
                                <th class="admin-table-header__detail">お問い合わせの種類</th>
                                <th class="admin-table-header__detail"></th>
                            </tr>
                            @foreach($contacts as $contact)
                            <tr class="admin-table-item">
                                <td>{{$contact->name}}</td>
                                <td>{{$contact->gender}}</td>
                                <td>{{$contact->email}}</td>
                                <td class="message-cell">
                                    @php

                                    $departments=[
                                        1=>'商品のお届けについて', 
                                        2=>'商品の交換について', 
                                        3=>'商品トラブル', 
                                        4=>'ショップへのお問い合わせ', 
                                        5=>'その他'];
                                        $number=(int)$contact->department;
                                        $text=$departments[$number] ?? '未分類';
                                    @endphp

                                    {{$number}}.{{$text}}
                                </td>
                                    <!--詳細ページ-->
                                <td>
                                    <a class="admin-table-item__detail" href="{{route('admin.contacts.show', $contact->id)}}" >詳細</a>
                                    <form action="{{route('admin.contacts.destroy', $contact->id)}}" method="POST" class="delete-form" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit">削除</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </table>
                    </div>
            </div>
    </div>

<!--モーダル　詳細の中身-->
<div class="detail" id="detail-model" style="display-none;">
    <form class="detail-form" action="{{route('admin.search')}}" method="GET">
        <a href={{route('admin.dashboard')}}>×</a>
        <table class="detail-table">
            <tr class="detail-table__row">
                <th class="detail-table__header">お名前</th>
                <td class="detail-table__item"  id="detail-name">{{contact->name}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">性別</th>
                <td class="detail-table__item" id="detail-gender">{{contact->gender}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">メールアドレス</th>
                <td class="detail-table__item" id="detail-email">{{contact->email}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">電話番号</th>
                <td class="detail-table__item" id="detail-tel">{{contact->tel}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">住所</th>
                <td class="detail-table__item" id="detail-address">{{contact->address}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">建物名</th>
                <td class="detail-table__item" id="detail-building">{{contact->building}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">お問い合わせの種類</th>
                <td class="detail-table__item" id="detail-department">{{contact->department}}</td>
            </tr>
            <tr class="detail-table__row">
                <th class="detail-table__header">お問い合わせ内容</th>
                <td class="detail-table__item" id="detail-message">{{contact->message}}</td>
            </tr>
        </table>
        <button id="delete-button">削除</button>
    </form>
</div>
@endsection