<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
class PostEditController extends Controller
{
   
    public function __invoke($id)
    {
        $post = Post::findOrFail($id);
        $this->authorize('update', $post);

        return view('post.update', compact('post'));
    }
}
