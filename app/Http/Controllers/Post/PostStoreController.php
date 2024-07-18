<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Http\Requests\PostRequest;

class PostStoreController extends Controller
{
    public function __invoke(PostRequest $request)
    {
        
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        $post = Post::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'user_id' => Auth::id(),
            'slug' => \Illuminate\Support\Str::slug($request->input('title'), '-') . '-' . \Illuminate\Support\Str::random(5),
            'image' => $imagePath, 
        ]);
        
        return redirect()->route('home');
    }
}
