@extends('layouts.app')

@section('content')

<div class=show_title_box>
<div class=show_title>
    <h1>{{$dance->title}}</h1>
</div>
</div>
<div class=show_movie_box>
    <div class=show_movie>
    <iframe width="700" height="500" src="https://www.youtube.com/embed/{{$dance->movie}}" 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<div class=show_box>
    リンク:<a href="https://youtu.be/{{$dance->movie}}" target="_blank">『{{$dance->title}}』をyoutubeで開く</a></>
<div class=show_genre>
    <p>ジャンル:{{$dance->genre}}</p>
</div>
<div class=show_subtitle>
    @if( $dance->subtitle !== null)
    <p>説明:{!! nl2br(e($dance->subtitle)) !!}</p>
    @endif
</div>
<div class=show_day>
    <p>投稿日:{{$dance->created_at}}</p>
</div>
<div class=home>
<a href="{{ route('dance') }}" class="btn btn--orange">ホームへ戻る</a>
</div>
<div class=edit>
@if( $dance->user_id === Auth::id() )<!--ログインユーザーと投稿者が同じなら、編集ボタンと削除ボタンを表示-->
<a href="{{ route('dance.edit', $dance->id)  }}" class="btn btn--orange">編集画面へ</a>
</div>
<div class=destroy>
<form action="{{ route('dance.destroy' , $dance->id) }}" method='post'>
@csrf
@method('DELETE')
<input type='submit' value='削除' class="btn btn--orange" onclick='return confirm("削除しますか？");'>
</form>
@endif
</div>
</div>


<hr>
@if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
@endif

<div class=comment_box>
<form method="post" action="{{ url('/comments')}}">
@csrf
<textarea name="body" cols="50" rows="10" ></textarea>
<input type="hidden" name="dance_id" value="{{ $dance->id }}">
<div class=comment_submit>
<input type="submit" value="コメントする"　onclick="return confirm('送信してよろしいですか？')">
</div>
</div>


<div class=comment_all>
<div class=comment>
<p>コメント</p>
</div>
<div class=comment_user>
@foreach ($comments as $comment)
  <p>{{$comment->user->name}}・{{$comment->created_at}}</p>
  <p>{!! nl2br(e($comment->body)) !!}
@endforeach
</div>
</div>







@endsection
