<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index(User $user)
    { 
        $follows = (Auth::user()) ? Auth::user()->following->contains($user->id) : false;
        // $userd = User::findOrFail($user);
        $postCount = Cache::remember( 'count.posts.'. $user->id, now()->addSeconds(30), function() use($user) {
            $user->posts->count();
        });
        $followsCount = $user->profile->followers->count();
        $followingCount = $user->following->count();
        return view('profile.index', compact("user", "follows", "postCount", "followingCount", "followsCount"));
        //or
        //return view('home', ["userd" => $userd ]);
    }

    public function edit(\App\Models\User $user)
    {   
        $this->authorize('update', $user->profile );
        return view('profile.edit', compact("user"));
        //or
        //return view('home', ["userd" => $userd ]);
    }

    public function update(User $user, Request $request)
    {
        $this->authorize('update', $user->profile );
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url' => '',
        ]);
            
        if($request->hasFile('image')){
            $imagePath = $request->file('image')->store('profile', 'public');
            $data2 = array_merge($data,
            ['image' => $imagePath ]);
            //dd($data2);
            auth()->user()->profile->update($data2);
        }else{
            auth()->user()->profile->update($data);
        }
        return redirect()->route('profile.show', ['user' => $user->id ]);
        }
}
