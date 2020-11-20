@extends('layouts.app')
@section('content')
<div class=create_title>
<h1>編集画面</h1>
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
<form action="{{ route('dance.update' ,$dance->id)}}" method="POST" enctype="multipart/form-data" >
<p>*がついているものは必須項目です。</p>
@csrf
{{ method_field('patch') }}
  <label for="title">タイトル*</label>
  <input name="title" value="{{ $dance->title }}"><br>
  <label for="genre">ジャンル*</label>
  <input name="genre"  value="{{ $dance->genre }}"><br>
  <label for="movie">動画URL*</label>
  <input name="movie" value="{{ $dance->movie }}"><br>
  <p>動画URLはyoutubeの共有ボタンから”https://youtu.be/”以降の文字をコピーし貼り付けてください。</p><br>
  <label for="subtitle">説明</label>
  <textarea name="subtitle" cols="50" rows="10" value="{{ $dance->subtitle }}"></textarea><br>
  <label for="thumbnail">サムネイル画像*</label>
  <input name="thumbnail" type="file" value="{{ $dance->thumbnail }}"><br>
  
  <div class=button>
     <input type="submit" value="更新する"　onclick="return confirm('更新してよろしいですか？')">
  </div>
</form>
</div>








@endsection
