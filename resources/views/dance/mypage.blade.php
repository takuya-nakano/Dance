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

<div class=mypage_dance>
<hr>
<h1>{{$auth->name}}さんの投稿内容</h1>
</div>
<div class=dance_all>

      @foreach($dances as $dance)
      <a href="{{ route('show' , $dance->id )}}">
         <div class=box>
            <div class=thumbnail_box>
               <div class=thumbnail>
                  <p><img src="{{ asset('/storage/'.$dance->thumbnail)}}"></p>
               </div>
            </div>
           
            <div class=genre>
               <p>ジャンル:{{$dance->genre}}</p>
            </div>
            <div class=title>
               <p>{{$dance->title}}</p>
            </div>
         </div>
      </a>
    @endforeach
    
</div>







@endsection
