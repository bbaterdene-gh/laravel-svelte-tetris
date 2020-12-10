<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Tetris</title>
            <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <style>
            body {
                font-family: 'Nunito';
            }
            .btn-flat-border {
              display: inline-block;
              padding: 0.3em 1em;
              text-decoration: none;
              color: #ffffff;
              border: solid 2px#ffffff;
              border-radius: 3px;
              transition: .4s;
            }

            .btn-flat-border:hover {
              background: #ffffff;
              color: #000000;
            }
        </style>
    </head>
    <body class="antialiased">
      @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline btn-flat-border">Home</a>
                <div id="svelte-app"></div>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline btn-flat-border">Login</a>

                @if (Route::has('register'))
                  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline btn-flat-border">Register</a>
                @endif
            @endif
        </div>
      @endif
    </body>
</html>
