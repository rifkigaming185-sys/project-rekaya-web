@extends('layouts.app')

@section('title', 'Admin Dashboard')

@section('content')
@include('partials.admin-header')

<div class="admin-layout">
    @include('partials.admin-sidebar')

    <div class="admin-main">
        <main class="admin-dashboard admin-dashboard--welcome">
            <h1>Admin Dashboard</h1>
            <p>Welcome to the admin dashboard!</p>
        </main>

        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} MyProfile. All rights reserved.</span>
        </footer>
    </div>
</div>
@endsection
