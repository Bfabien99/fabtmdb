@props(['movie'])
<div class="filmBox">
    <img src="https://image.tmdb.org/t/p/w300/{{ $movie->poster_path }}" alt="">
    <div class="details">
        <h4 class="title"><a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a></h4>
        <p class="description">{{ Str::limit($movie->overview, 100) }}</p>
        <hr>
        <em>{{ $movie->original_language }}</em>
    </div>
</div>