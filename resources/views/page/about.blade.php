@extends('layouts.app')

@section('title', 'About')
@section('content')
<div class="about-page">
    <div class="container py-5">
        <div class="about-panel">
            <h1>Tentang Aplikasi</h1>
            <p>aplikasi ini adalah project praktikum rekayasa web Prodi SI UNPAM</p>
        </div>
    </div>
</div>

<style>
    body {
        background: #efefef;
    }

    .about-page {
        min-height: calc(100vh - 330px);
        background: #efefef;
        padding-top: 18px;
    }

    .about-panel {
        padding: 8px 0 0;
    }

    .about-panel h1 {
        margin: 0;
        font-size: clamp(2.7rem, 4vw, 4.3rem);
        line-height: 1.08;
        font-weight: 800;
        color: #111827;
    }

    .about-panel p {
        margin-top: 18px;
        margin-bottom: 0;
        color: #3d465a;
        font-size: clamp(1.2rem, 1.8vw, 1.7rem);
        line-height: 1.5;
        max-width: 980px;
    }
</style>
@endsection