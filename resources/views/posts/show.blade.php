@extends('layouts.app')

@section('content')
@php $base = URL::to('/') @endphp
<div class="container mx-auto md:max-w-screen-lg">
    <div class="flex">
        <div class="flex flex-col px-3 h-60 w-full md:flex-row post-image-md">
            <div class="post-image h-full w-full bg-center bg-cover" style="background-image:url('{{ $base }}/storage/{{$post->image }}')"></div>
        </div>
        
        <div class="post-cont pt-4 pl-3 md:pt-6 md:pl-0 min-w-10">
        <div class="post-user text-xl">
                {{ $post->user->username }}
            </div>
            <div class="  capitalize">
                {{ $post->caption }}
            </div>
            
        </div>
    </div>
</div>
@endsection