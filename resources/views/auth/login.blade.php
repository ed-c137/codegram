@extends('layouts.app')

@section('content')
<div class="m-auto flex justify-center w-4/5 md:w-1/3">
    <div class="bg-white inline-block w-full pt-14 rounded shadow md:pb-40 pb-20">
            <div class="flex-col flex">
                <div class="card-header  mx-auto text-2xl">{{ __('Login') }}</div>

                <div class="card-body mx-auto p-6 md:w-2/3 w-4/5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row my-2">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="border-solid border-gray-300 bg-gray-200 border @error('email') is-invalid @enderror w-full rounded" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row my-2">
                            <label for="password" class="col-md-4  col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="border-solid border border-gray-300 bg-gray-200 @error('password') is-invalid @enderror w-full rounded" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-sm" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="flex flex-col">
                                <button type="submit" class="btn btn-primary rounded w-full text-white bg-blue-500 my-2 py-1 text-md">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link text-sm" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        
    </div>
</div>
@endsection
