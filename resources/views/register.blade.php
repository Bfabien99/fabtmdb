@extends('layout')
@section('content')
    <form action="/register" method="post" class="form">
        <h3>Register</h3>
        @csrf
        @if (session()->has('error'))
            <small class="error">{{ session('error') }}</small>
        @endif
        <div class="group">
            <label for="name">Your Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}">
            @error('name')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="group">
            <label for="email">Your Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="group">
            <label for="password">Your Password</label>
            <input type="password" name="password" id="password">
            @error('password')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <div class="group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="password_confirmation" id="cpassword">
            @error('password_confirmation')
                <small class="error">{{ $message }}</small>
            @enderror
        </div>
        <input type="submit" value="Register">
    </form>
@endsection
