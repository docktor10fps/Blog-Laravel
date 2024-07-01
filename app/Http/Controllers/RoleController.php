<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;
use App\Models\User;

class RoleController extends Controller
{

public function __invoke(){

    $user = User::currentRole();
    return(dd($user));
    
    }
}
