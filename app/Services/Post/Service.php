<?php

namespace App\Services\Post;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;

class Service
{
    public function store($request)
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

        if (isset($request['tags'])) {
            $tags = [];
            foreach ($request['tags'] as $tagTitle) {
                $tag = Tag::firstOrCreate(['title' => $tagTitle]);
                $tags[] = $tag->id;
            }

            $post->tags()->attach($tags);
        }
    }
    public function update($post, $request)
    {
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();
    }
}
