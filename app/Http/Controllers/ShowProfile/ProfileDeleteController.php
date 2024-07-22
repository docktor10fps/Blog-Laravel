<?php

namespace App\Http\Controllers\ShowProfile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileDeleteController extends Controller
{
    public function __invoke($id){
        
        $post = User::findOrFail($id);
        $post->delete();
        return redirect()->route('home');
    }
}
