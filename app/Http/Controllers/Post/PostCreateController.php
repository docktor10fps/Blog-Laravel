<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostCreateController extends Controller
{
    public function __invoke()
    {
        return view('post.create');        
    }
}
