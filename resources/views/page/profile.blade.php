@extends('layouts.app')

@section('title', 'Profile')

@section('content')
<div class="profile-page">
    <div class="container py-5">
        <div class="profile-card">
            <div class="profile-header">
                <img src="{{ asset('img/rekaya_web.jpg') }}" alt="Profile mahasiswa" class="profile-image">
                <h1>Profile Mahasiswa</h1>
                <span class="status-badge">{{ $mahasiswa['status'] }}</span>
            </div>
            <div class="profile-body">
                <p><strong>Nama:</strong> {{ $mahasiswa['nama'] }}</p>
                <p><strong>NIM:</strong> {{ $mahasiswa['nim'] }}</p>
                <p><strong>Program Studi:</strong> {{ $mahasiswa['prodi'] }}</p>
                <p><strong>Email:</strong> {{ $mahasiswa['email'] }}</p>
                <p><strong>Kampus:</strong> {{ $mahasiswa['kampus'] }}</p>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #efefef;
    }

    .profile-page {
        min-height: calc(100vh - 330px);
        background: #efefef;
        padding-top: 20px;
    }

    .profile-card {
        max-width: 760px;
        margin: 0 auto;
        background: rgba(255, 255, 255, 0.82);
        border: 1px solid rgba(15, 23, 42, 0.09);
        border-radius: 22px;
        box-shadow: 0 12px 24px rgba(15, 23, 42, 0.07);
        overflow: hidden;
    }

    .profile-header {
        background: linear-gradient(180deg, rgba(255,255,255,0.8), rgba(233,242,255,0.8));
        text-align: center;
        padding: 28px 20px 16px;
    }

    .profile-image {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid rgba(29, 78, 216, 0.12);
        box-shadow: 0 12px 24px rgba(29, 78, 216, 0.12);
        margin-bottom: 12px;
    }

    .profile-header h1 {
        margin: 0 0 10px;
        font-size: clamp(1.9rem, 2.8vw, 2.6rem);
        font-weight: 800;
        color: #101827;
    }

    .status-badge {
        display: inline-block;
        background: linear-gradient(135deg, #10b981, #059669);
        color: #fff;
        border-radius: 999px;
        padding: 7px 14px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .profile-body {
        padding: 26px 30px 30px;
    }

    .profile-body p {
        margin: 0 0 12px;
        color: #334155;
        font-size: 1.05rem;
        line-height: 1.8;
    }
</style>
@endsection