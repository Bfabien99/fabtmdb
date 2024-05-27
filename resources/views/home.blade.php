@extends('layout')
@section('content')
    <section>
        <h4 class="section-title">Discover - Movie</h4>
        <div class="grid">
            @foreach ($discover_movies->results as $movie)
            <x-fb-movie :movie="$movie"></x-fb-movie>
            @endforeach
        </div>
    </section>
    <section>
        <h4 class="section-title">Discover - Series</h4>
        <div class="grid">
            @foreach ($discover_tv->results as $tv)
                <x-fb-tv :tv="$tv"></x-fb-tv>
            @endforeach
        </div>
    </section>
@endsection
