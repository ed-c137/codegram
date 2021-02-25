
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

       
            <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

         <!-- Scripts -->
         <script src="https://code.iconify.design/1/1.0.7/iconify.min.js" defer></script>
        
    </head>


    <body class="antialiased">
        <div id="app">
        <nav class="navbar navbar-expand-md navbar-light  text-white bg-white shadow relative flex items-top justify-center  bg-gray-700 sm:items-center sm:pt-0">
            <div class="container flex justify-between py-3 px-3">
                <a class="navbar-brand" href="{{ url('/') }}">
                <div class=" flex items-center divide-x divide-gray-300">
                    <span><img class="max-h-9" src="https://www.searchpng.com/wp-content/uploads/2019/02/Avengers-Logo-PNG-Transparent-Avengers-Logo-715x715.png" alt="a"></span>
                    <span class="pl-2"> {{ config('app.name', 'Laravel') }}</span>
                </div>
                   
                </a>
                <button class="md:hidden" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span id="menu-btn bg-gray-700">
                    <span class="iconify" data-icon="ic:round-menu" data-inline="false"></span>
                    </span>
                </button>

                <div class="hidden md:inline-block" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="flex ">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item px-2">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item px-2">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown relative">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div id="navdrop" class="dropdown-menu dropdown-menu-right absolute bg-gray-800 w-full block top-9 transition duration-400" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item px-1  py-1 w-full inline-block flex items-center justify-between" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                        <span class=""><span class="iconify" data-icon="ic:baseline-exit-to-app" data-inline="false"></span></span>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <main class="py-4">
            
            @yield('content')
        </main>
        </div>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
