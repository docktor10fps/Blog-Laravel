<?php

namespace App\Http\Controllers\Follow;
use App\Models\User;
use App\Models\Follow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function __invoke(User $user)
    {
        $currentUser = auth()->user();
        
        /** @var User $currentUser */
        $currentUser->followings()->attach($user->id);
     
        return back();
    }
}