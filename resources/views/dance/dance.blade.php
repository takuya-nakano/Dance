@extends('layouts.app')

@section('content')
<div class=dai_box>
    <div class=dai>
       <h1>みんなでダンスをシェアしよう！</h1>
    </div>
</div>


@foreach($dances as $dance)
<a href="{{ route('show' , $dance->id )}}">
<div class=box>
   <div class=movie_box>
      <div class=movie>
         <!--動画表示について書く-->
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




@endsection