@extends('layouts.app')
@section('content')
<div class=create_image>
<div class=create_title>
<h1>お気に入りのダンスを共有しよう！</h1>
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
<form method="post" action="" enctype="multipart/form-data" name="create">
<p>*がついているものは必須項目です。</p>
@csrf
　
  <label for="title">タイトル*</label>
  <input name="title" placeholder="タイトルを入力して下さい。" value="{{ old('title') }}"><br>
  <label for="genre">ジャンル*</label>
  <input name="genre" placeholder="ジャンルを入力して下さい。" value="{{ old('genre') }}"><br>
  <label for="movie">動画URL*</label>
  <input name="movie"placeholder="動画URLを入力して下さい。" ><br>
  <p>動画URLはyoutubeの共有ボタンから”https://youtu.be/”以降の文字をコピーし貼り付けてください。</p><br>
  <label for="subtitle">説明</label><br>
  <textarea name="subtitle" cols="39" rows="10" placeholder="説明"　value="{{ old('subtitle') }}"></textarea><br>
  <label for="thumbnail">サムネイル画像*</label>
  <input name="thumbnail" type="file"><br>
  
  <div class=button>
     <input type="submit" value="シェアする"　onclick="return confirm('送信してよろしいですか？')">
  </div>
</form>
</div>
</div>








@endsection
