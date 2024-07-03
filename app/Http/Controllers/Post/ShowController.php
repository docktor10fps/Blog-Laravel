<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ShowController extends Controller
{
    public function __invoke()
    {
        $posts = Post::all();
        
        return view(dd($posts));        
    }
}
