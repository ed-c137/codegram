<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function __construct(){
        $this->middleware('auth');
    }

    public function store(User $user){
    //     $usera = User::find(1);
    //    return $usera->following()->toggle(1);
            $authUser = User::find(Auth::id());
           // return  $authUser->profile->following();
         return  $authUser->following()->toggle($user->profile->id);
        // return $user->id;
    }
}
