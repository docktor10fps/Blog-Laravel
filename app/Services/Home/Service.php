<?php

namespace App\Services\Home;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;

class Service
{
    public function show($userId)
    {
        // Отримання постів поточного користувача
        $postsCurrentUser = Post::where('user_id', $userId)->get();

        // Отримання постів користувачів, на яких підписаний поточний користувач
        $user = User::find($userId);
        $postsFollowings = Post::whereIn('user_id', $user->followings()->pluck('users.id'))
            ->where('created_at', '>=', Carbon::now()->subDays(5))
            ->orderBy('created_at', 'desc')
            ->get();

        // Об'єднання постів поточного користувача та постів підписників
        $posts = $postsCurrentUser->merge($postsFollowings);

        // Отримання всіх коментарів та тегів
        $comments = Comment::all();
        $tags = Tag::all();

        // Повернення даних як асоціативний масив
        return [
            'posts' => $posts,
            'comments' => $comments,
            'tags' => $tags
        ];
    }
}
