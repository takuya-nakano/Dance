@extends('layouts.app')
@section('content')
<div class=create_title>
<h1>あなたの最高のダンスを投稿しよう！</h1>
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
<div class=create>
<form method="post" action="" enctype="multipart/form-data">
@csrf
  <label for="title">タイトル</label>
  <input class="" name="title" value="{{ old('title') }}"><br>
  <label for="genre">ジャンル</label>
  <input class="" name="genre" value="{{ old('genre') }}"><br>
  <label for="subtitle">説明</label>
  <textarea class="" name="subtitle" cols="50" rows="10" value="{{ old('subtitle') }}"></textarea><br>
  <label for="movie">動画ファイル</label>
  <input class="" type="file" name="movie">
  <div class=button>
     <input type="submit" value="投稿する"　onclick="return confirm('投稿してよろしいですか？')">
  </div>
</form>
</div>








@endsection
