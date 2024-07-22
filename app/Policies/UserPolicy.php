<?php

namespace App\Policies;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function isOwner(User $currentUser, User $user)
    {
        return Auth::user()->id === $user->id;
    }
}
