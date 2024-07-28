<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Http\Requests\UpdateRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Post\BaseController;

class PostUpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request, $id)
    {
        $post = Post::findOrFail($id);

        $this->authorize('update', $post);

        $this->service->update($post,$request);

        return redirect()->route('home');
    }
}
