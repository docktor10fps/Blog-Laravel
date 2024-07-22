<?php

namespace App\Http\Controllers\ShowProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use App\Models\User;

class ProfileEditController extends Controller
{
   
    public function __invoke($id)
    {
        
         $user = User::findOrFail($id);
        // //$this->authorize('update', $post);

        return view('profile.update', compact('user'));
    }
}
