<?php

namespace App\Http\Controllers\ShowProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
class ProfileShowController extends Controller
{
    public function __invoke($user_id)
    {
      $id=$user_id;
      $user = User::find($id);
      //$this->authorize('view', $user);
      $posts = Post::where('user_id', $user_id)->get();
    
      return view('profile.index', compact('posts','user') );
    }
}
