@extends('layouts.app')

@section('content')
<div class="container mx-auto md:max-w-screen-md">
    <div class="row justify-content-center">
        <div class="flex flex-col px-3 md:flex-row">
            <div class="profil-cont m-auto md:pr-10 pb-3 md:pb-0 flex-1">
                <!-- <div class="profile-pic rounded-full w-40 h-40 bg-center bg-cover m-auto" style="background-image:url('https://images.unsplash.com/photo-1457449940276-e8deed18bfff?ixid=MXwxMjA3fDB8MHxzZWFyY2h8Nnx8cHJvZmlsZXxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80');"> -->
                <div class="profile-pic rounded-full w-40 h-40 bg-center bg-cover m-auto" style="background-image:url('{{ $user->profile->profileImage() }}')"></div>
            
            </div>
        <div class="profile-stat flex-2">
       
            <div class="row1 flex pb-3">
                <div class="profile-name text-xl font-semibold">
                    {{ $user->username }}
                </div>
                @cannot('update', $user->profile)
                <!-- <follow-button user-id="{{$user->id}}" ></follow-button> -->
                <follow-button user-id="{{$user->id}}" follows="{{ $follows }}"></follow-button>
                @endcannot
                @can('update', $user->profile)
                <a href="{{ route( 'profile.edit', ['user' => $user->id ] ) }}" class="bg-gray-300 text-gray-700 rounded px-3 py-1 ml-3 text-sm">Edit</a>
               
                <a href="{{ route( 'post.create', ['user' => $user->id ] ) }}" class="bg-gray-300 text-gray-700 rounded px-3 py-1 ml-3 text-sm">Add Post</a>
                @endcan
            </div>
           
            <div class="row2 flex  justify-between pb-3 max-w-sm">
                <div class="col-post">
                    <span class="num">{{ $postCount }}</span>
                    <span class="text">posts</span>
                </div>
                <div class="col-followers">
                    <span class="num">{{ $followersCount }}</span>
                    <span class="text">followers</span>
                </div>
                <div class="col-folowing"> 
                    <span class="num">{{ $followingCount }}</span>
                    <span class="text">following</span>
                </div>
            </div>
            <div class="row3">
                <div class="acc-f-name font-semibold">{{ $user->name }}</div>
                <div class="acc-title text-gray-500 text-sm">{{ $user->profile->title }}</div>
                <div class="acc-bio">{{ $user->profile->description }}</div>
                <div class="acc-links font-semibold text-blue-800">
                    www.johndoe.com
                </div>
            </div>
        </div>

        </div>
        <hr>
       @php $base = URL::to('/') @endphp
        <?php //$baseurl = 'http://'.$_SERVER['SERVER_NAME'].'/storage/'; ?>
        
        <div class="profile-content flex pt-5 flex-wrap px-2 md:px-0">
            @foreach ($user->posts as $post)
            <div class="post w-full md:w-1/3 h-52 p-2">
                <!-- <div class="post-image h-full bg-center bg-cover" style="background-image:url('{{ url( "storage/".$post->image ) }}');"></div> -->
                <a href="{{ '/p/'.$post->id}}">
                <div class="post-image h-full bg-center bg-cover" style="background-image:url({{ $base . '/storage/'. $post->image }})"></div>
                </a>
            </div>
            @endforeach
            <!-- <div class="post w-full md:w-1/3 h-52 p-2">
                <div class="post-image h-full bg-center bg-cover" style="background-image:url('https://images.unsplash.com/photo-1501630834273-4b5604d2ee31?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8Y2xvdWRzfGVufDB8fDB8&ixlib=rb-1.2.1&w=1000&q=80');"></div>
            </div>
            <div class="post w-full md:w-1/3 h-52 p-2">
                <div class="post-image h-full bg-center bg-cover" style="background-image:url('https://images.unsplash.com/photo-1494783367193-149034c05e8f?ixid=MXwxMjA3fDB8MHxzZWFyY2h8MXx8aG9yaXpvbnxlbnwwfHwwfA%3D%3D&ixlib=rb-1.2.1&w=1000&q=80');"></div>
            </div>
            <div class="post w-full md:w-1/3 h-52 p-2">
                <div class="post-image h-full bg-center bg-cover" style="background-image:url('https://images.unsplash.com/photo-1502759683299-cdcd6974244f?auto=format&fit=crop&w=440&h=220&q=60');"></div>
            </div> -->
        </div>
    </div>
</div>
@endsection
