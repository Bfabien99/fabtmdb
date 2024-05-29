@extends('layout')
@section('content')
<section>
    <h3 class="section-title">Favorites</h3>
    @if(count($favorites)==0)
    <p class="text-white" style="text-align: center">No favorites yet</p>
    @else
    <div class="grid">
        @foreach ( $favorites as $favorite)
        <div class="filmBox">
            <img src="https://image.tmdb.org/t/p/w300/{{$favorite->poster_path}}" alt="">
            <h3 class="title text-white"><a href="/{{$favorite->type == 'movie' ? 'movies/' : 'tv/'}}{{$favorite->type_id}}">{{$favorite->title}}</a></h3>
            <hr>
            <h3 class="title text-white">{{$favorite->type}}</h3>
        </div>
        @endforeach
    </div>
    @endif
</section>
@endsection
