@extends('layouts.app')

@section('content')

<div class=manual_box>
      <div class=manual>
         <h1>みんなで"YABAI"ダンスをシェアしよう</h1>
            <p>このサイトではYouTube上のダンス動画を投稿し、皆さんで共有していただけます!<br>
               ダンス動画の共有方法はログイン後、ページ上部にある(スマートフォンの場合は右上のメニューバーをタップ)<br>"ダンスをシェアする" ボタンから共有してください！<br>
               それぞれの”YABAI”と思うダンスを共有して、盛り上がりましょう！<br>
               <a href="{{ route('dance') }}">ホームへ戻る</a>
            </p>
      </div>
</div>









@endsection