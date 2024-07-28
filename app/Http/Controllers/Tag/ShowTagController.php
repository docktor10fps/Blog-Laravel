<?php

namespace App\Http\Controllers\Tag;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class ShowTagController extends Controller
{
    public function __invoke($id)
    {
        $tag= Tag::findOrFail($id);
        $posts = $tag->posts;
        return view('tag.index', compact('tag', 'posts'));
    }
}
