<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Http\Requests\CommentUpdateRequest;
use Illuminate\Support\Facades\Auth;

class CommentUpdateController extends Controller
{   
    public function __invoke(CommentUpdateRequest $request, $id)
    {
       
        $comment = Comment::findOrFail($id);

         $this->authorize('update', $comment);
        
        $comment->content = $request->input('content');
        $comment->save();

        return redirect()->route('comment.show', $comment->post_id );
    }
}
