<?php

namespace App\Http\Controllers\ShowProfile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ProfileShowController extends Controller
{
    public function __invoke()
    {
      $data = Auth::user();  
      return view('profile.index', [
        'roles' => User::currentRole(),
        'user' => $data['name'],
        'email' => $data['email']
    ]);
    }
}
