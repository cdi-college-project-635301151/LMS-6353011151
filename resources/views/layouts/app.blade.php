<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    {{-- JQuery --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- font awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <div id="app">
        @if (Auth::user())
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @guest
                                {{-- @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif --}}
                            @else
                            @endguest

                            {{-- Dahsboard --}}
                            <li class="nav-item">
                                <a class="nav-link text-primary"
                                    href="{{ route('home.index') }}">{{ __('Dashboard') }}</a>
                            </li>

                            {{-- Transactions --}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>{{ __('Transactions') }}</a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                    <a href="#" class="dropdown-item">{{ __('Reservations') }}</a>
                                    <a href="#" class="dropdown-item">{{ __('Loans') }}</a>
                                </div>
                            </li>

                            {{-- Books --}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>{{ _('Books') }}</a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navdropDown">
                                    <a href="#" class="dropdown-item">{{ __('Book Lists') }}</a>
                                    <a href="{{ route('book-isbn.index') }}"
                                        class="dropdown-item">{{ __('ISBN') }}</a>
                                    <a href="{{ route('authors.index') }}"
                                        class="dropdown-item">{{ __('Authors') }}</a>
                                    <a href="{{ route('categories.index') }}"
                                        class="dropdown-item">{{ __('Book Categories') }}</a>
                                    <a href="{{ route('genre.index') }}"
                                        class="dropdown-item">{{ __('Book Genres') }}</a>
                                    <a href="{{ route('maturity.index') }}"
                                        class="dropdown-item">{{ __('Book Maturity') }}</a>
                                </div>
                            </li>

                            {{-- Members --}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Members') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdwon">
                                    <a href="{{ route('members.index') }}" class="dropdown-item">
                                        {{ __('View Members') }}
                                    </a>

                                    <a href="{{ route('members.create') }}" class="dropdown-item">
                                        {{ __('Register Member') }}
                                    </a>
                                </div>
                            </li>

                            {{-- Users --}}
                            <li class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ __('Users') }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('sys-users.index') }}" class="dropdown-item">
                                        {{ __('View Users') }}
                                    </a>

                                    <a href="{{ route('sys-users.create') }}" class="dropdown-item">
                                        {{ __('Register') }}
                                    </a>
                                </div>
                            </li>

                            {{-- Logout --}}
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>



                        </ul>
                    </div>
                </div>
            </nav>
        @else
            @if (Route::currentRouteName() != '')
                <script>
                    window.location.replace('/')
                </script>
            @endif
        @endif


        <main class="py-4">
            <div class="container-md">
                @yield('content')
            </div>
        </main>
    </div>

</body>

</html>
