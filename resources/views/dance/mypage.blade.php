@extends('layouts.app')

@section('content')
<div class=mypage_title>
<h1>マイページトップ</h1>
</div>
<div class=mypage_box>
<p>ユーザーID:{{$auth->id}}</p>
<p>ユーザー名:{{$auth->name}}</p>
<p>メールアドレス:{{$auth->email}}</p>
<p>パスワード:パスワードは安全の為表示できません。</p>
<p>最終更新日時:{{$auth->updated_at}}</p>
<div class=home>
<a href="{{ route('dance') }}" class="btn btn--orange">ホームへ戻る</a>
</div>

</div>





@endsection
