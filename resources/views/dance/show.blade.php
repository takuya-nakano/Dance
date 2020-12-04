@extends('layouts.app')

@section('content')
<div class=show_wrapper>
<div class=show_title_box>
<div class=show_title>
    <h1>{{$dance->title}}</h1>
</div>
</div>
<div class=show_movie_box>
    <div class=show_movie>
    <iframe src="https://www.youtube.com/embed/{{$dance->movie}}" 
    frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
</div>

<div class=show_box>
    <p>投稿者: {{$dance->user->name}}</p>
    <p>リンク:<a href="https://youtu.be/{{$dance->movie}}" target="_blank">『{{$dance->title}}』をyoutubeで開く</a></p>
<div class=show_genre>
    <p>ジャンル:{{$dance->genre}}</p>
</div>
<div class=show_subtitle>
    @if( $dance->subtitle !== null)
    <p>説明:{!! nl2br(e($dance->subtitle)) !!}</p>
    @endif
</div>
<div class=show_day>
    <p>投稿日:{{$dance->created_at->format('Y.m.d')}}</p>
</div>
<div class=home>
<a href="{{ route('dance') }}" class="btn btn--orange">ホームへ戻る</a>
<div class=iine>
  @if($dance->is_liked_by_auth_user())
    <a href="{{ route('dance.unlike', ['id' => $dance->id]) }}" class="btn btn-success btn-sm">♡ "YABAI"ね<span class="badge">{{ $dance->likes->count() }}</span></a>
  @else
    <a href="{{ route('dance.like', ['id' => $dance->id]) }}" class="btn btn-secondary btn-sm">♡ "YABAI"ね<span class="badge">{{ $dance->likes->count() }}</span></a>
  @endif
</div>



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
<div class=comment_ran>
<p>コメント欄</p>
</div>
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
<textarea name="body" cols="40" rows="10" ></textarea>
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
<div class=comment_user_each>
  <p>投稿者:{{$comment->user->name}} / 投稿日:{{$comment->created_at->format('Y.m.d')}}</p>
  <p>{!! nl2br(e($comment->body)) !!}</p>
  @if( $comment->user_id === Auth::id() )
  <form action="{{ route('comment.destroy' , $comment->id) }}" method='post'>
　　　@csrf
　　　@method('DELETE')
     <div class=comment_delete>
　　　<input type='submit' value='削除' class="btn btn--orange" onclick='return confirm("削除しますか？");'>
     </div>     
　</form>
 @endif
 </div>
  <hr>
@endforeach
</div>
</div>
</div>






@endsection
