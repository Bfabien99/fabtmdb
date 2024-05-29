@extends('layout')
@section('content')
    <section>
        <h2 class="section-title">Discover - Movie</h2>
        <div class="grid">
            @foreach ($discover_movies->results as $movie)
                <x-fb-movie :movie="$movie"></x-fb-movie>
            @endforeach
        </div>
        <div class="other-details">
            <div class="pages">
                <p>Current page : {{ $discover_movies->page }} on 500</p>
                <form action="" method="get">
                    <h5>Saisi une page</h5>
                    <input type="number" name="page">
                    @if ($errors->has('page'))
                        <small class="error">{{ $errors->first('page') }}</small>
                    @endif
                </form>
            </div>
            <div class="nav-pages">
                @if (request('page') > 1)
                    <a href="?page={{ request('page') - 1 }}">Prev</a>
                @endif
                @if (request('page') < 500 || $discover_movies->page < 500)
                    @if (empty(request('page')))
                        <a href="?page=2">Next</a>
                    @else
                        <a href="?page={{ request('page') + 1 }}">Next</a>
                    @endif
                @endif
            </div>
        </div>
    </section>
@endsection
