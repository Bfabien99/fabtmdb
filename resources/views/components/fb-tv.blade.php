@props(['tv'])
<div class="filmBox">
    <img src="https://image.tmdb.org/t/p/w300/{{ $tv->poster_path }}" alt="">
    <div class="details">
        <h4 class="title"><a href="/tv/{{ $tv->id }}">{{ $tv->name }}</a></h4>
        <p class="description">{{ Str::limit($tv->overview, 100) }}</p>
        <hr>
        <em>{{ $tv->original_language }}</em>
    </div>
</div>