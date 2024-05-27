@extends('layout')
@section('content')
    <section>
        <div>
            <h2 class="section-title">TV Details</h2>
            <x-tv-detail :tv='$tv'></x-tv-detail>
        </div>
    </section>
    <section>
        <h3 class="section-title">Other seasons</h3>
        <div class="grid">
            @foreach ($tv->seasons as $season)
            <div class="filmDetails">
                <img src="https://image.tmdb.org/t/p/w300/{{ $season->poster_path }}" alt="">
                <div class="details" style="border:1px solid">
                    <h4 class="title">{{ $season->name }}</h4>
                    <div class="table">
                        <p class="col"><span>Nb Ep</span><span>{{ $season->episode_count }}</span></p>
                        <p class="col"><span>Air Date</span><span>{{ $season->air_date }}</span></p>
                        <p class="col"><span>Vote average</span><span>{{ $season->vote_average }}</span></p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>
@endsection
