@extends('layouts.app')

@section('content')
<div class="container mx-auto md:max-w-screen-md">
    <div class="flex-col flex">
        <div class="post-title text-2xl text-center">Edit Profile</div>
        <div class="card-body mx-auto p-6 md:w-2/3 w-4/5">
                    <form method="POST"  enctype="multipart/form-data" action="{{ route( 'profile.update', ['user' => $user->id ] ) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group row my-2">
                            <label for="title" class="col-md-4 col-form-label text-md-right">{{ __('title') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('title') is-invalid @enderror" name="title" value="{{ old('title') ?? $user->profile->title }}" autocomplete="title" autofocus>

                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label for="description" class="col-md-4 col-form-label text-md-right">{{ __('description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('description') is-invalid @enderror" name="description" value="{{ old('description') ?? $user->profile->description  }}"  autocomplete="description" autofocus>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row my-2">
                            <label for="url" class="col-md-4 col-form-label text-md-right">{{ __('url') }}</label>

                            <div class="col-md-6">
                                <input id="url" type="text" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('url') is-invalid @enderror" name="url" value="{{ old('url') ?? $user->profile->url  }}"  autocomplete="url" autofocus>

                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Profile Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="border-solid border-gray-300 bg-gray-200 form-control w-full rounded @error('image') is-invalid @enderror" name="image" value="{{ old('image') }}"  >

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
                                    {{ __('Save Profile') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
    </div>
</div>
@endsection
