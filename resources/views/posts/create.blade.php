@extends('layouts.app')

@section('content')
<div class="container mx-auto md:max-w-screen-md">
    <div class="flex-col flex">
        <div class="post-title text-2xl text-center">Create Post</div>
        <div class="card-body mx-auto p-6 md:w-2/3 w-4/5">
                    <form method="POST"  enctype="multipart/form-data" action="{{ route('post.store') }}">
                        @csrf

                        <div class="form-group row my-2">
                            <label for="caption" class="col-md-4 col-form-label text-md-right">{{ __('Caption') }}</label>

                            <div class="col-md-6">
                                <input id="caption" type="text" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" required autocomplete="caption" autofocus>

                                @error('caption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Post Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}" required >

                                @error('image')
                                    <span class="invalid-feedback bg-red-100 border-red-400 border" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
      
                    
                        <div class="form-group row mb-0 mt-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary rounded w-full text-white bg-blue-500 my-2 py-1 text-md">
                                    {{ __('Uplaod') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
