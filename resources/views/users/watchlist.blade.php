@extends('layout')
@section('content')
<section>
    <h3 class="section-title">Watchlist</h3>
    @if(count($watchlists)==0)
    <p class="text-white" style="text-align: center">No watchlists yet</p>
    @else
    <div class="grid">
        @foreach ( $watchlists as $watchlist)
        <div class="filmBox">
            <img src="https://image.tmdb.org/t/p/w300/{{$watchlist->poster_path}}" alt="">
            <h3 class="title text-white"><a href="/{{$watchlist->type == 'movie' ? 'movies/' : 'tv/'}}{{$watchlist->type_id}}">{{$watchlist->title}}</a></h3>
            <hr>
            <h3 class="title text-white">{{$watchlist->type}}</h3>
        </div>
        @endforeach
    @endif
</section>
@endsection
