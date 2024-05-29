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
                <ul>
                     <li><a href="/">Home</a></li>
                <li><a href="/movies">Movies</a></li>
                <li><a href="/tv">Series</a></li>
                </ul>
               <ul>
                @auth
                <li><a href="/profil">Profil</a></li>
                <li><a href="/favorites">Favorites</a></li>
                <li><a href="/to-watch">watchlist</a></li>
                <li><form action="/logout" method="post">@csrf<input type="submit" value="Logout"></form></li>
                @else
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
                @endauth
               </ul>
            </nav>
        </header>
        <main>
            @yield('content')
        </main>
        <footer>

        </footer>
    </body>
</html>
