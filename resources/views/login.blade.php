@extends('layout')
@section('content')
    <form action="/login" method="post">
        @csrf
        @if(session()->has('error'))
    <small class="error">{{session('error')}}</small>
@endif
        <div class="group">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" value="{{old('email')}}">
            @error('email')
                <small class="error">{{$message}}</small>
            @enderror
        </div>
        <div class="group">
            <label for="password">Your Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <small class="error">{{$message}}</small>
            @enderror
        </div>
        <input type="submit" value="Login">
    </form>
@endsection
