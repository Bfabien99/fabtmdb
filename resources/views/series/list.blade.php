@extends('layout')
@section('content')
    <section>
        <h2 class="section-title">Discover - TV</h2>
        <div class="grid">
            @foreach ($discover_tv->results as $tv)
                <x-fb-tv :tv="$tv"></x-fb-tv>
            @endforeach
        </div>
        <div class="other-details">
            <div class="pages">
                <p>Current page : {{ $discover_tv->page }} on 500</p>
                <form action="" method="get">
                    <h5>Saisi une page</h5>
                    <input type="number" name="page">
                    @if ($errors->has('page'))
                        <div class="error">{{ $errors->first('page') }}</div>
                    @endif
                </form>
            </div>
            <div class="nav-pages">
                @if (request('page') > 1)
                    <a href="?page={{ request('page') - 1 }}">Prev</a>
                @endif
                @if (request('page') < 500 || $discover_tv->page < 500)
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
