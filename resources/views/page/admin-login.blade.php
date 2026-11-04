@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
<main class="admin-login-page">
    <section class="admin-login-card" aria-labelledby="admin-login-title">
        <h1 id="admin-login-title">Admin Login</h1>

        <form action="{{ route('login.store') }}" method="POST">
            @csrf

            <div class="admin-login-field">
                <label for="email">Email address</label>
                <input
                    id="email"
                    name="email"
                    type="email"
                    value="{{ old('email') }}"
                    autocomplete="username"
                    required
                    autofocus
                >
                @error('email')
                    <span class="admin-login-error">{{ $message }}</span>
                @enderror
            </div>

            <div class="admin-login-field">
                <label for="password">Password</label>
                <input
                    id="password"
                    name="password"
                    type="password"
                    autocomplete="current-password"
                    required
                >
                @error('password')
                    <span class="admin-login-error">{{ $message }}</span>
                @enderror
            </div>

            <label class="admin-login-remember" for="remember">
                <input id="remember" name="remember" type="checkbox" value="1">
                <span>Remember me</span>
            </label>

            <button class="admin-login-submit" type="submit">Login</button>
        </form>
    </section>
</main>
@endsection
