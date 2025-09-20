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
                            {{$contacts->appends(request()->query())->links()}}
                        </div>
                    </div>
                    </div>

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
                                <td>{{$contact->department}}</td>
                                <td>{{$contact->message}}</td>
                                <td>
                                    <a class="admin-table-item__detail" href="#" data-name="{{$contact->name}}" data-gender="{{$contact->gender}}" data-email="{{$contact->email}}" data-tel="{{$contact->tel}}" data-address="{{$contact->address}}" data-building="{{$contact->building}}" data-department="{{$contact->department}}" data-message="{{$contact->message}}">詳細</a>
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
@endsection