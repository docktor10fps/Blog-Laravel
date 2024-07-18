<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;

class PostUpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $currentUserId = Auth::id();
        $postUserId = $post->user_id;
        
        // if ($currentUserId !== $postUserId) {
        //     return response()->json([
        //         'message' => 'Неавторизована дія',
        //         'current_user_id' => $currentUserId,
        //         'post_user_id' => $postUserId
        //     ], 403);
        // }


        $post->title = $request->input('title');
        $post->content = $request->input('content');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect()->route('home');
    }
}
