<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentDeleteController extends Controller
{
    public function __invoke($id){
        
        $comment = Comment::findOrFail($id);

        $this->authorize('update', $comment);

        $comment->delete();
        return redirect()->route('comment.show', $comment->post_id );
    }
}
