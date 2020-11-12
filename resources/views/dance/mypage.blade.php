@extends('layouts.app')

@section('content')

<h1>マイページトップ</h1>

<p>ユーザーID:{{$auth->id}}</p>
<p>ユーザー名:{{$auth->name}}</p>
<p>メールアドレス:{{$auth->email}}</p>
<p>パスワード：パスワードは安全の為表示できません。</p>
<p>最終更新日時:{{$auth->updated_at}}</p>





@endsection
