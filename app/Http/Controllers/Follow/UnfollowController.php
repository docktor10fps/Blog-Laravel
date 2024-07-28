<?php

namespace App\Http\Controllers\Follow;
use App\Models\User;
use App\Models\Follow;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UnfollowController extends Controller
{
    public function __invoke(User $user)
    {
        $currentUser = auth()->user();

         /** @var User $currentUser */
        $currentUser->followings()->detach($user->id);

        return back();
    }
}
