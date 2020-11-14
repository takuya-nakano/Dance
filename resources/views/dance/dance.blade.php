@extends('layouts.app')

@section('content')
<div class=dai_box>
    <div class=dai>
       <h1>みんなで"YABAI"ダンスをシェアしよう！</h1>
       <div class="yabai">
         <a href="">”YABAI”の楽しみ方</a>
       </div>
    </div>
</div>


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




@endsection