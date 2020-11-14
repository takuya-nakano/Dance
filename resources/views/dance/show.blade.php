@extends('layouts.app')

@section('content')
<div class=show_title_box>
<div class=show_title>
    <h1>{{$dance->title}}</h1>
</div>
</div>
<div class=show_movie_box>
    <div class=show_movie>
        <!--動画について記述-->
    </div>
</div>
<div class=show_box>
<div class=show_genre>
    <p>ジャンル:{{$dance->genre}}</p>
</div>
<div class=show_subtitle>
    <p>説明:{!! nl2br(e($dance->subtitle)) !!}</p>
</div>
<div class=show_day>
    <p>投稿日:{{$dance->created_at}}</p>
</div>
<div class=home>
<a href="{{ route('dance') }}" class="btn btn--orange">ホームへ戻る</a>
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
<input type="submit" value="コメントする"　onclick="return confirm('送信してよろしいですか？')">
</div>


<div class=comment_all>
<div class=comment>
<p>コメント欄</p>
</div>
<div class=comment_user>
@foreach ($comments as $comment)
  <p>{{$comment->created_at}}</p>
  <p>{!! nl2br(e($comment->body)) !!}</p>
@endforeach
</div>
</div>







@endsection
