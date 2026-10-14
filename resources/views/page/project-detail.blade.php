@extends('layouts.app')

@section('title', 'Project Detail')

@section('content')
<div class="project-detail-page">
    <div class="container py-4">
        <div class="mb-4">
            <a href="{{ route('project.index') }}" class="btn btn-back">Kembali</a>
        </div>

        <div class="project-detail-card">
            <div class="row g-0 align-items-stretch">
                <div class="col-lg-7">
                    <div class="project-media-wrap">
                        <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}" class="project-media">
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="project-detail-body">
                        <div class="detail-kicker">Project</div>
                        <h1>{{ $project->title }}</h1>

                        <div class="tech-stack">
                            <span>{{ $project->teknologi }}</span>
                        </div>

                        <div class="status-row">
                            @php
                                $status = strtolower(str_replace(' ', '-', $project->status ?? 'selesai'));
                            @endphp
                            <span class="detail-status status-{{ $status }}">{{ $project->status }}</span>
                        </div>

                        <p class="project-description">{{ $project->description }}</p>

                        <div class="meta-row">
                            <span class="meta-label">Dibuat</span>
                            <span class="meta-value">{{ $project->created_at->format('d M Y') }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    body {
        background: #efefef;
    }

    .project-detail-page {
        min-height: calc(100vh - 330px);
        background: #efefef;
        padding-top: 10px;
    }

    .btn-back {
        background: linear-gradient(135deg, #dc2626, #ef4444);
        border: 0;
        color: #fff;
        border-radius: 12px;
        padding: 0.8rem 1.5rem;
        font-weight: 700;
        box-shadow: 0 12px 20px rgba(220, 38, 38, 0.18);
    }

    .btn-back:hover {
        color: #fff;
        background: linear-gradient(135deg, #c81f1f, #de3b3b);
    }

    .project-detail-card {
        background: rgba(255, 255, 255, 0.8);
        border: 1px solid rgba(15, 23, 42, 0.08);
        border-radius: 24px;
        overflow: hidden;
        box-shadow: 0 16px 32px rgba(15, 23, 42, 0.08);
    }

    .project-media-wrap {
        height: 100%;
        min-height: 360px;
        background: #dfe7f6;
    }

    .project-media {
        display: block;
        width: 100%;
        height: 100%;
        min-height: 360px;
        object-fit: cover;
    }

    .project-detail-body {
        padding: 28px 28px 30px;
        background: linear-gradient(180deg, rgba(248,250,255,0.9), rgba(255,255,255,0.9));
    }

    .detail-kicker {
        display: inline-block;
        padding: 7px 12px;
        border-radius: 999px;
        background: #dfeafe;
        color: #1d4ed8;
        font-size: 0.72rem;
        font-weight: 800;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        margin-bottom: 12px;
    }

    .project-detail-body h1 {
        margin: 0;
        font-size: clamp(2rem, 3vw, 3rem);
        line-height: 1.15;
        font-weight: 800;
        color: #111827;
    }

    .tech-stack {
        margin-top: 18px;
    }

    .tech-stack span {
        display: inline-block;
        padding: 9px 14px;
        border-radius: 999px;
        background: #edf4ff;
        color: #1d4ed8;
        font-size: 0.82rem;
        font-weight: 700;
    }

    .status-row {
        margin-top: 18px;
    }

    .detail-status {
        display: inline-block;
        padding: 8px 14px;
        border-radius: 999px;
        color: #fff;
        font-size: 0.75rem;
        font-weight: 700;
    }

    .status-selesai {
        background: linear-gradient(135deg, #10b981, #059669);
    }

    .status-in-progress {
        background: linear-gradient(135deg, #f59e0b, #f97316);
    }

    .project-description {
        margin-top: 20px;
        margin-bottom: 22px;
        color: #475569;
        font-size: 1.02rem;
        line-height: 1.8;
    }

    .meta-row {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        gap: 10px;
        padding-top: 16px;
        border-top: 1px solid rgba(15, 23, 42, 0.08);
    }

    .meta-label {
        color: #64748b;
        font-size: 0.85rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.08em;
    }

    .meta-value {
        color: #0f172a;
        font-size: 0.95rem;
        font-weight: 700;
    }

    @media (max-width: 991.98px) {
        .project-detail-body {
            padding: 22px 20px 24px;
        }
    }
</style>
@endsection