<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;
class PostController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');   
    }

    public function index(){
    $user = User::find(Auth::id())->following()->pluck('profiles.user_id');
        //dd($user);
    //$posts = Post::whereIn('user_id', $user)->get();
    $posts = Post::whereIn('user_id', $user)->with('user')->paginate(3);//for pagination
      //dd($posts);  
    return view('posts.index', compact('posts'));
    }
    
    public function create(){
        return view('posts.create');
    }

    // public function use(){
    //     //This is just some test description i wrote to test out this new instagram clone called codegram
    //     $post = \App\Models\Post::find(Auth::user()->id);
    //     dd($post->create(['caption' => 'A new caption.', 'image' => '/var/temp' ],));
    // }

    public function store(Request $request){

        $data = $request->validate([
            'caption' => 'required',
            'image' => 'required | image',
        ]);
        $user = auth()->user();
        $imagePath = $request->file('image')->store('uploads', 'public');
            //dd($imagePath);
         \App\Models\Post::create([
             'user_id' => $user->id,
             'caption' => $data['caption'],
             'image' => $imagePath
         ]);
        
         return redirect()->route('profile.show', [$user]);
         
        
    }

    public function show(\App\Models\Post $post){
        return view('posts.show', compact('post'));
    }
}
