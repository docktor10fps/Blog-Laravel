<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostDeleteController extends Controller
{
    public function __invoke($id){
        
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
