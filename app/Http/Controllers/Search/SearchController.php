<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function __invoke(){
        
        $message = 'the user does not exist';
        $name = $_POST['search'];
        $user = User::where('name', $name)->first();
        if($user===null){
            return back()->with('error', $message);
        }
        else
        return redirect()->route('profile.index', $user->id);
    }
}
