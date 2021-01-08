<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body class="bg-gray-100">

@if(auth()->guest())
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>
@else
    <nav class="bg-white">
        <div class="container mx-auto">
            <div class="flex justify-between items-center py-2">
                <h1>
                    <a href="{{ url('/') }}" class="navbar-brand">
                        <img src="/images/logo.svg" alt="Birdboard">
                    </a>
                </h1>
            </div>
        </div>
    </nav>


    <main class="container py-4 mx-auto">
        @yield('content')
    </main>

@endif


</body>
</html>
