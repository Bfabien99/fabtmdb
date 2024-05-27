<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <header>
            <p class="banner">
                FABTMDB
            </p>
            <nav>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                <li><a href="/movies">Movies</a></li>
                <li><a href="/tv">Series</a></li>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>

        </footer>
    </body>
</html>
