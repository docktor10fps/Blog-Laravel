<?php

namespace App\Http\Controllers\Post;

use App\Http\Controllers\Post\BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\PostRequest;

class PostStoreController extends BaseController
{
    public function __invoke(PostRequest $request)
    {
       $this->service->store($request);

        return redirect()->route('home');
    }
}
