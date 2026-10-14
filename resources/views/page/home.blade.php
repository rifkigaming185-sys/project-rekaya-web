@extends('layouts.app')

@section('title', 'Home')
@section('content')
<div class="home-page">
    <div class="container py-5">
        <div class="home-panel">
            <h1>Selamat Datang</h1>
            <p>ini halaman utama web profile mahasiswa prodi SI UNPAM</p>
            <a href="{{ url('/profile') }}" class="btn btn-home">Lihat Profile</a>
        </div>
    </div>
</div>

<style>
    body {
        background: #efefef;
    }

    .home-page {
        min-height: calc(100vh - 330px);
        background: #efefef;
        padding-top: 18px;
    }

    .home-panel {
        padding: 8px 0 0;
    }

    .home-panel h1 {
        margin: 0;
        font-size: clamp(2.7rem, 4vw, 4.3rem);
        line-height: 1.08;
        font-weight: 800;
        color: #111827;
    }

    .home-panel p {
        margin-top: 18px;
        margin-bottom: 22px;
        color: #3d465a;
        font-size: clamp(1.2rem, 1.8vw, 1.7rem);
        line-height: 1.5;
        max-width: 980px;
    }

    .btn-home {
        background: linear-gradient(135deg, #0ea5a4, #0f766e);
        border: 0;
        color: #fff;
        border-radius: 12px;
        padding: 0.8rem 1.5rem;
        font-weight: 700;
        box-shadow: 0 12px 20px rgba(15, 118, 110, 0.18);
    }

    .btn-home:hover {
        color: #fff;
        background: linear-gradient(135deg, #0d8d8a, #0d6f67);
    }
</style>
@endsection