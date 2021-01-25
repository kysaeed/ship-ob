<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">


        <link href="{{ asset(mix('css/app.css')) }}" rel="stylesheet">
        <script src="{{ asset(mix('js/manifest.js')) }}" defer></script>
        <script src="{{ asset(mix('js/vendor.js')) }}" defer></script>
		<script src="{{ asset(mix('js/app.js')) }}" defer></script>
    </head>
    <body>
        <div >
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

        <div id="app">
            <ship-world-view></ship-world-view>
        </div>
    </body>
</html>
