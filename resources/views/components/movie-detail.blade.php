@props(['movie'])
<div class="filmDetails">
    <img src="https://image.tmdb.org/t/p/w400/{{ $movie->poster_path }}" alt="">
    <div class="details">
        <h2 class="title text-white">{{ $movie->title }}</h2>
        <div class="links">
            <a class="to-visit" target="_blank" href="{{ $movie->homepage }}">visit site</a>
            @auth
            @if (count(auth()->user()->favorite('movie', $movie->id))>0)
            <a href="/favorites/remove/{{$movie->id}}/movie" class="to-love to-love-full">Del fav</a>
            @else
            <a href="/favorites/{{$movie->id}}/movie" class="to-love">Add fav</a>
            @endif
            @if (count(auth()->user()->watchlist('movie', $movie->id))>0)
            <a href="/watchlist/remove/{{$movie->id}}/movie" class="to-watch to-watch-full">Del watch</a>
            @else
            <a href="/watchlist/{{$movie->id}}/movie" class="to-watch">To watch</a>
            @endif
            @endauth
        </div>
        <p class="description text-white">{{$movie->overview }}</p>
        <div class="genres">
            @foreach ($movie->genres as $genre)
                <a href="#" class="genre">{{$genre->name}}</a>
            @endforeach
        </div>
        <div class="company">
            @foreach ($movie->production_companies as $company)
                <div class="companyBox">
                    <img src="https://image.tmdb.org/t/p/w200/{{$company->logo_path}}" alt="{{$company->name}}" title="{{$company->name}}">
                </div>
            @endforeach
        </div>
        <div class="table">
            <p class="col"><span>tagline</span><span>{{$movie->tagline}}</span></p>
            <p class="col"><span>budget</span><span>{{number_format($movie->budget)}}</span></p>
            <p class="col"><span>revenue</span><span>{{number_format($movie->revenue)}}</span></p>
            <p class="col"><span>original title</span><span>{{$movie->original_title}}</span></p>
            <p class="col"><span>original language</span><span>{{$movie->original_language}}</span></p>
            <p class="col"><span>popularity</span><span>{{($movie->popularity)}}</span></p>
            <p class="col"><span>runtime</span><span>{{$movie->runtime}}</span></p>
            <p class="col"><span>status</span><span>{{$movie->status}}</span></p>
            <p class="col"><span>vote average</span><span>{{$movie->vote_average}}</span></p>
            <p class="col"><span>vote count</span><span>{{number_format($movie->vote_count)}}</span></p>
        </div>
    </div>
</div>