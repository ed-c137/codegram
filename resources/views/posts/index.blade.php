@extends('layouts.app')

@section('content')
@php $base = URL::to('/') @endphp
<div class="container mx-auto md:max-w-screen-md space-y-6">
@foreach($posts as $post)
    <div class="flex flex-col-reverse">
        <div class="flex flex-col px-3 h-96 w-full md:flex-row post-image-md">
            <div class="post-image h-full w-full bg-center bg-cover" style="background-image:url('{{ $base }}/storage/{{$post->image }}')"></div>
        </div>
        
        <div class="post-cont px-3 pt-4 pl-3 md:pt-6 min-w-10">
        <div class="post-user text-xl">
                {{ $post->user->username }}
            </div>
            <div class="  capitalize">
                {{ $post->caption }}
            </div>
            
        </div>
    </div>
@endforeach
<div class="paginationcontainer">
    <div class="pagination flex justify-center">
        {{$posts->links()}}
    </div>
</div>
</div>
@endsection