<?php

namespace App\Http\Controllers\ShowProfile;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileUpdateController extends Controller
{
    public function __invoke(ProfileUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);

      //  $this->authorize('update', $post);

        // $currentUserId = Auth::id();
        // $postUserId = $post->user_id;
        
        $user->name = $request->input('name');
        

        if ($request->hasFile('avatar')) {
            $imagePath = $request->file('avatar')->store('image', 'public');
            $user->image = $imagePath;
        }

        $user->save();

        return redirect()->route('profile.index', $user->id);
    }
}
