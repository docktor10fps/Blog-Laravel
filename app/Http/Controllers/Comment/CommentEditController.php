<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;
class CommentEditController extends Controller
{
   
    public function __invoke($id)
    {
        $comment = Comment::findOrFail($id);
        
        $this->authorize('update', $comment);

        return view('comment.update', compact('comment'));
    }
}
