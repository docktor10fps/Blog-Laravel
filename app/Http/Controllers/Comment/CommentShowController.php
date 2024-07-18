<?php

namespace App\Http\Controllers\Comment;
use App\Models\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentShowController extends Controller
{
    public function __invoke($id){
        
         $comments = Comment::where('post_id', $id)->get();
        
         return view('comment.show', compact('comments'));
    }
}
