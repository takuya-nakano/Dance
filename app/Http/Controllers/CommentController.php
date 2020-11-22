<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
       $this->validate(
            $request,
            [
                'body' => 'required|string|max:50',
            ],
            [
                'body.required' => 'コメントは必須です。',
                'body.string' => 'コメントは文字列で入力してください。',
                'body.max' => 'コメントは50字以内で入力してください。',
            ]
            );
        
        
        $comment = new Comment;
        
        $comment->body = $request->body;
        $comment->dance_id = $request->dance_id;
        $comment->user_id = Auth::user()->id;

        $comment->save();

        return redirect()-> back();
    
    }


    public function delete($id)
    {
            $comment = Comment::find($id);

            

            $comment->delete();
            
            
            return redirect()->back();
    }

    
}
