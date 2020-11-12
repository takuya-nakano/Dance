@extends('layouts.app')

@section('content')
<h1>動画一覧</h1>


@foreach($dances as $dance)

<!--動画表示について書く-->
<p>{{$dance->title}}</p>
<p>{{$dance->genre}}</p>

@endforeach




@endsection