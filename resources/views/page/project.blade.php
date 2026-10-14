@extends('layouts.app')

@section('title', 'Project')

@section('content')
<div class="portfolio-page">
    <section class="portfolio-hero">
        <div class="container py-5">
            <div class="hero-shell">
                <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3">
                    <div>
                        <span class="hero-badge">Portfolio</span>
                        <h1 class="hero-title mt-3">Portofolio Project</h1>
                        <p class="hero-subtitle mb-0">Daftar project yang dikerjakan oleh mahasiswa</p>
                    </div>
                    <a href="#project-list" class="btn btn-view-all">Lihat Semua</a>
                </div>
            </div>
        </div>
    </section>

    <section id="project-list" class="project-section pb-5">
        <div class="container">
            <div class="row g-4">
                @foreach ($projects as $project)
                    @php
                        $statusClass = strtolower(str_replace(' ', '-', $project->status ?? 'selesai'));
                    @endphp
                    <div class="col-md-6 col-xl-4">
                        <article class="project-card h-100">
                            <div class="project-image-wrap">
                                <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}" class="project-image">
                                <span class="project-status status-{{ $statusClass }}">{{ $project->status }}</span>
                            </div>
                            <div class="project-body">
                                <div class="project-meta">
                                    <span class="project-tag">Web Development</span>
                                </div>
                                <h3 class="project-title">{{ $project->title }}</h3>
                                <p class="project-description">{{ Str::limit($project->description, 90) }}</p>
                                <div class="project-tech">
                                    <span>{{ $project->teknologi }}</span>
                                </div>
                                <a href="{{ route('project.show', $project->id) }}" class="btn project-button">Detail Project</a>
                            </div>
                        </article>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $projects->links('pagination::bootstrap-5') }}
            </div>
        </div>
    </section>
</div>

<style>
    body {
        background: linear-gradient(180deg, #edf3ff 0%, #f7f9ff 100%);
        color: #1d2433;
    }

    .portfolio-page {
        min-height: calc(100vh - 120px);
    }

    .portfolio-hero {
        padding-top: 20px;
    }

    .hero-shell {
        background: rgba(255, 255, 255, 0.7);
        border: 1px solid rgba(123, 147, 199, 0.18);
        border-radius: 28px;
        box-shadow: 0 12px 35px rgba(18, 31, 67, 0.08);
        padding: 32px 28px;
        backdrop-filter: blur(4px);
    }

    .hero-badge {
        display: inline-flex;
        align-items: center;
        padding: 8px 14px;
        border-radius: 999px;
        background: #dfeafe;
        color: #2d5ad9;
        font-size: 12px;
        font-weight: 700;
        letter-spacing: 0.08em;
        text-transform: uppercase;
    }

    .hero-title {
        font-size: clamp(2.2rem, 3vw, 3.2rem);
        font-weight: 800;
        margin-bottom: 0;
        color: #101827;
    }

    .hero-subtitle {
        font-size: 1.02rem;
        color: #5b6478;
        margin-top: 10px;
    }

    .btn-view-all {
        background: #1d4ed8;
        color: #fff;
        border-radius: 12px;
        padding: 0.8rem 1.4rem;
        font-weight: 600;
        box-shadow: 0 14px 24px rgba(29, 78, 216, 0.2);
    }

    .btn-view-all:hover {
        background: #163eb4;
        color: #fff;
    }

    .project-section {
        padding-top: 20px;
    }

    .project-card {
        background: rgba(255, 255, 255, 0.9);
        border: 1px solid rgba(136, 153, 189, 0.18);
        border-radius: 22px;
        overflow: hidden;
        box-shadow: 0 18px 30px rgba(17, 24, 39, 0.07);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .project-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 24px 34px rgba(17, 24, 39, 0.12);
    }

    .project-image-wrap {
        position: relative;
        overflow: hidden;
    }

    .project-image {
        width: 100%;
        height: 240px;
        object-fit: cover;
        display: block;
        transition: transform 0.3s ease;
    }

    .project-card:hover .project-image {
        transform: scale(1.05);
    }

    .project-status {
        position: absolute;
        top: 16px;
        right: 16px;
        border-radius: 999px;
        padding: 6px 10px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.02em;
        color: #fff;
    }

    .status-selesai {
        background: linear-gradient(135deg, #0ea5e9, #2563eb);
    }

    .status-in-progress {
        background: linear-gradient(135deg, #f59e0b, #f97316);
    }

    .project-body {
        padding: 20px 20px 22px;
    }

    .project-meta {
        margin-bottom: 10px;
    }

    .project-tag {
        display: inline-flex;
        align-items: center;
        padding: 6px 10px;
        border-radius: 999px;
        background: #eef4ff;
        color: #2d5ad9;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.05em;
        text-transform: uppercase;
    }

    .project-title {
        margin: 0 0 10px;
        font-size: 1.45rem;
        font-weight: 700;
        color: #111827;
    }

    .project-description {
        font-size: 0.95rem;
        color: #59657d;
        line-height: 1.7;
        margin-bottom: 14px;
    }

    .project-tech {
        padding: 10px 12px;
        border-radius: 12px;
        background: #f5f7ff;
        color: #2d4a77;
        font-size: 0.8rem;
        font-weight: 600;
        margin-bottom: 16px;
    }

    .project-button {
        width: 100%;
        border-radius: 12px;
        background: #0f172a;
        color: #fff;
        font-weight: 600;
        padding: 0.8rem 1rem;
    }

    .project-button:hover {
        background: #1e293b;
        color: #fff;
    }

    .pagination {
        --bs-pagination-color: #1d4ed8;
        --bs-pagination-active-bg: #1d4ed8;
        --bs-pagination-active-border-color: #1d4ed8;
        --bs-pagination-focus-box-shadow: 0 0 0 0.25rem rgba(29, 78, 216, 0.1);
    }

    @media (max-width: 767.98px) {
        .hero-shell {
            padding: 24px 18px;
        }

        .project-title {
            font-size: 1.25rem;
        }
    }
</style>
@endsection