<?php

namespace App\Http\Controllers;

use App\Dance;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class DanceController extends Controller
{
    //一覧画面について
    public function index()
    {
          $dances = Dance::orderby('created_at','desc')->get();

          return view('dance.dance',compact('dances'));
        
    }

    //マイページについて
    public function mypage()
    {
        $auth = Auth::user();
        return view('dance.mypage',['auth' => $auth]);
    }

    //投稿画面について
    public function createform()
    {
        return view('dance.create');
    }
    
    public function create(Request $request)
    {
        $this->validate(
            $request,
            [
                'title' => 'required|max:20',
                'genre' => 'required',
                'movie' => 'required',
    
            ],
            [
                'title.required' => 'タイトルは必須です。',
                'title.max' => 'タイトルは20文字以下です。',
                'genre.required' => 'ジャンルは必須です。',
                'movie.required' => '動画を選択してください。',
    
            ]
        );
            $dance = new Dance();
            //登録ユーザーからidを取得
            $dance->user_id = Auth::user()->id; 
            $dance->title = $request->title;
            $dance->subtitle = $request->subtitle;
            $dance->movie = $request->movie;
            $dance->genre = $request->genre;
            // インスタンスの状態をデータベースに書き込む
            $dance->save();
            return redirect()->route('dance');
    
    }

    //詳細
    public function show ($id){
        //show.bladeの＄danceは○番の$idを見つける
        $dance = Dance::find($id);
        //データベースから情報を持ってくる
        $comments = $dance->comments()->orderby('created_at' , 'desc')->get();
        //dd($comments);
        //compact()で上で定義した$commentsの内容をviewさせる
        return view ('dance.show', compact('dance','comments'));
    }


}
