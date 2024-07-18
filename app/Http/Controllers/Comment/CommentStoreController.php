<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;


class CommentStoreController extends Controller
{
    public function __invoke(CommentRequest $request)
    {
   
        $postId = $request->input('post_id');
        $userId = Auth::id();
        $comment = $request->input('comment');

     
        $comment = Comment::create([
            'post_id' => $postId,
            'user_id' => $userId,
            'content' => $comment,
        ]);
        return redirect()->route('home');
        
    }
}
