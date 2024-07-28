<?php

namespace App\Policies;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TagPolicy
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
    public function tags(Tag $tag)
    {   /** @var Tag $tag */
        return $tag->id === $tag->tag_id ;
    }
}
