@extends('layout')
@section('content')
    <section>
        <div>
            <h2 class="section-title">Movie Details</h2>
            <x-movie-detail :movie='$movie'></x-movie-detail>
        </div>
    </section>
@endsection
