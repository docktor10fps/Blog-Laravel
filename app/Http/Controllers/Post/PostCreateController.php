<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    public function __invoke()
    {
        $tags = Tag::all();
       
        return view('post.create', compact('tags') );        
    }
}
