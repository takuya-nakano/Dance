@extends('layouts.app')
@section('content')
<form method="post" action="" enctype="multipart/form-data">
@csrf
  <label for="title">タイトル</label>
  <input class="" name="title" value="{{ old('title') }}"><br>
  <label for='genre'>ジャンル</label>
  <input class="" name="genre" value="{{ old('genre') }}"><br>
  <label for="subtitle">詳細</label>
  <textarea class="" name="subtitle" cols="50" rows="10" value="{{ old('subtitle') }}"></textarea><br>
  <label for="movie">動画ファイル</label>
  <input class="" type="file" name="movie">

  <input type="submit" value="投稿する"　onclick="return confirm('投稿してよろしいですか？')">


  
</form>







@endsection
