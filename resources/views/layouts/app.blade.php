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

    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-gray-100 h-screen antialiased leading-none font-sans">
    <div id="app">
        <header class="bg-white py-4">
            <div class="container mx-auto flex justify-between items-center px-6">
                <div>
                    <h1>
                        <a href="{{ url('/') }}" class="text-lg font-semibold text-gray-100 no-underline">
                            <img src="/images/birdboard.svg" alt="Birdboard">
                        </a>
                    </h1>
                </div>
                <nav class="space-x-4 text-gray-300 text-sm sm:text-base">
                    <div class="flex items-center ml-auto">
                        @guest
                            <a class="no-underline hover:underline" href="{{ route('login') }}">{{ __('Login') }}</a>
                            @if (Route::has('register'))
                                <a class="no-underline hover:underline" href="{{ route('register') }}">{{ __('Register') }}</a>
                            @endif
                        @else
                            <span class="mr-5">{{ Auth::user()->name }}</span>

                            <a href="{{ route('logout') }}"
                               class="no-underline hover:underlie"
                               onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                                {{ csrf_field() }}
                            </form>
                        @endguest
                    </div>
                </nav>
            </div>
        </header>
        <main class="container py-4 mx-auto">
            @yield('content')
        </main>
    </div>
</body>
</html>
