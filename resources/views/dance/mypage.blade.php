@extends('layouts.app')

@section('content')
<h1>マイページトップ</h1>

<p>ユーザー名:{{$auth->name}}</p>
<p>ユーザーID:{{$auth->id}}</p>
<p>メールアドレス:{{$auth->email}}</p>
<p>最終更新日時:{{$auth->updated_at}}</p>





@endsection
