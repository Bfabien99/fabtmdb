@props(['tv'])
<div class="filmDetails">
    <img src="https://image.tmdb.org/t/p/w400/{{ $tv->poster_path }}" alt="">
    <div class="details">
        <h2 class="title text-white">{{ $tv->name }}</h2>
        <div class="links">
            <a class="to-visit" target="_blank" href="{{ $tv->homepage }}">visit site</a>
            @auth
                @if (count(auth()->user()->favorite('tv', $tv->id))>0)
                <a href="/favorites/remove/{{$tv->id}}/tv" class="to-love to-love-full">Del fav</a>
                @else
                <a href="/favorites/{{$tv->id}}/tv" class="to-love">Add fav</a>
                @endif
                @if (count(auth()->user()->watchlist('tv', $tv->id))>0)
                <a href="/watchlist/remove/{{$tv->id}}/tv" class="to-watch to-watch-full">Del watch</a>
                @else
                <a href="/watchlist/{{$tv->id}}/tv" class="to-watch">To watch</a>
                @endif
            @endauth
        </div>
        <p class="description text-white">{{$tv->overview }}</p>
        <div class="genres">
            @foreach ($tv->genres as $genre)
                <a href="#" class="genre text-white">{{$genre->name}}</a>
            @endforeach
        </div>
        <div class="company">
            @foreach ($tv->production_companies as $company)
                <div class="companyBox">
                    <img src="https://image.tmdb.org/t/p/w200/{{$company->logo_path}}" alt="{{$company->name}}" title="{{$company->name}}">
                </div>
            @endforeach
        </div>
        <div class="table">
            <p class="col"><span>tagline</span><span>{{$tv->tagline}}</span></p>
            <p class="col"><span>episode run time</span><span>@foreach ($tv->episode_run_time as $runtime)
                '{{$runtime}}'
            @endforeach</span></p>
            <p class="col"><span>first air date</span><span>{{$tv->first_air_date}}</span></p>
            <p class="col"><span>last air date</span><span>{{$tv->last_air_date}}</span></p>
            <p class="col"><span>in production</span><span>{{$tv->in_production ? 'true' : 'false'}}</span></p>
            <p class="col"><span>number of episodes</span><span>{{$tv->number_of_episodes}}</span></p>
            <p class="col"><span>number of seasons</span><span>{{$tv->number_of_seasons}}</span></p>
            <p class="col"><span>original language</span><span>{{$tv->original_language}}</span></p>
            <p class="col"><span>type</span><span>{{$tv->type}}</span></p>
            <p class="col"><span>popularity</span><span>{{$tv->popularity}}</span></p>
            <p class="col"><span>status</span><span>{{$tv->status}}</span></p>
            <p class="col"><span>vote average</span><span>{{$tv->vote_average}}</span></p>
            <p class="col"><span>vote count</span><span>{{number_format($tv->vote_count)}}</span></p>
        </div>
    </div>
</div>