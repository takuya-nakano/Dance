@extends('layouts.app')

@section('content')
<h1>動画一覧</h1>


@foreach($dances as $dance)
<a href="{{ route('dance.show' , $dance->id )}}">
<!--動画表示について書く-->
<p>{{$dance->title}}</p>
<p>{{$dance->genre}}</p>
</a>
@endforeach




@endsection