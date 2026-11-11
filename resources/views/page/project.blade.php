@extends('layouts.app')

@section('title', 'Project')

@section('content')
@include('partials.admin-header')

<div class="admin-layout">
    @include('partials.admin-sidebar')

    <div class="admin-main">
        <main class="admin-content admin-dashboard">
            <header class="admin-topbar">
                <div>
                    <p class="admin-topbar__eyebrow">Admin Menu</p>
                    <h1>Data Project</h1>
                </div>

                <div class="admin-topbar__actions">
                    <span class="admin-campus">Prodi Sistem Informasi UNPAM</span>
                    <a href="{{ route('project.create') }}" class="btn admin-btn-primary">Tambah Project</a>
                    <a href="{{ route('project.pdf') }}" class="btn admin-btn-pdf" target="_blank" rel="noopener">Cetak PDF</a>
                </div>
            </header>

            <section class="admin-panel">
                <form class="admin-table-tools" method="GET" action="{{ route('project.index') }}">
                    <label class="admin-entries-control" for="project-per-page">
                        Show
                        <select id="project-per-page" name="per_page" onchange="this.form.submit()">
                            @foreach ([10, 25, 50, 100] as $pageSize)
                                <option value="{{ $pageSize }}" @selected($perPage === $pageSize)>{{ $pageSize }}</option>
                            @endforeach
                        </select>
                        entries
                    </label>

                    <div class="admin-search-wrap">
                        <label for="project-search">Search:</label>
                        <input id="project-search" name="search" type="search" value="{{ $search }}" />
                        <button type="submit" class="btn admin-btn-secondary">Cari</button>
                    </div>
                </form>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Teknologi</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($projects as $project)
                                @php
                                    $statusClass = match (strtolower($project->status ?? 'active')) {
                                        'active' => 'status-active',
                                        'archived' => 'status-archived',
                                        'draft' => 'status-draft',
                                        default => 'status-active',
                                    };
                                @endphp
                                <tr>
                                    <td>{{ $projects->firstItem() + $loop->index }}</td>
                                    <td>
                                        @if ($project->image)
                                            <img class="project-thumbnail" src="{{ asset('images/' . $project->image) }}" alt="Gambar {{ $project->title }}">
                                        @else
                                            <span aria-label="Tidak ada gambar">—</span>
                                        @endif
                                    </td>
                                    <td class="project-title-cell">{{ $project->title }}</td>
                                    <td>{{ $project->teknologi }}</td>
                                    <td class="project-description-cell">{{ Str::limit($project->description, 110) }}</td>
                                    <td>
                                        <span class="status-badge {{ $statusClass }}">{{ ucfirst($project->status ?? 'active') }}</span>
                                    </td>
                                    <td class="action-cell">
                                        <a href="{{ route('project.show', $project->id) }}" class="btn btn-table btn-table--view">Detail</a>
                                        <button type="button" class="btn btn-table btn-table--danger">Hapus</button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="empty-state">Belum ada project.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="admin-pagination">
                    {{ $projects->links('pagination::bootstrap-5') }}
                </div>
            </section>
        </main>

        <footer class="admin-footer">
            <span>&copy; {{ date('Y') }} MyProfile. All rights reserved.</span>
        </footer>
    </div>
</div>

<style>
    body {
        margin: 0;
        background: #eef2f5;
        color: #1a2333;
        min-height: 100vh;
    }

    .admin-dashboard {
        min-height: calc(100vh - 92px);
        background: #eef2f8;
    }

    .admin-footer {
        background: #0f172a;
        color: rgba(255, 255, 255, 0.8);
        font-size: 0.78rem;
        padding: 12px 0;
        text-align: center;
        letter-spacing: 0.03em;
    }

    .admin-content {
        max-width: 1280px;
        margin: 0 auto;
        padding: 30px 26px 28px;
    }

    .admin-topbar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 22px;
        padding: 6px 4px 16px;
        border-bottom: 1px solid rgba(148, 163, 184, 0.2);
    }

    .admin-topbar__eyebrow {
        margin: 0 0 6px;
        color: #64748b;
        font-size: 0.72rem;
        letter-spacing: 0.08em;
        text-transform: uppercase;
        font-weight: 700;
    }

    .admin-topbar h1 {
        margin: 0;
        font-size: clamp(1.8rem, 2vw, 2.6rem);
        font-weight: 800;
        color: #111827;
    }

    .admin-topbar__actions {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .admin-campus {
        display: inline-flex;
        align-items: center;
        padding: 9px 14px;
        background: #e2eafc;
        color: #1d4ed8;
        border-radius: 999px;
        font-size: 0.8rem;
        font-weight: 700;
    }

    .admin-layout .admin-btn-primary {
        border: 1px solid #0d6efd;
        background: #0d6efd;
        color: #fff;
        padding: 0.55rem 0.8rem;
        border-radius: 4px;
        font-weight: 700;
        box-shadow: none;
    }

    .admin-layout .admin-btn-primary:hover {
        border-color: #0b5ed7;
        background: #0b5ed7;
        color: #fff;
    }

    .admin-btn-pdf {
        border: 1px solid #dc3545;
        border-radius: 4px;
        background: #dc3545;
        color: #fff;
    }

    .admin-btn-pdf:hover {
        border-color: #bb2d3b;
        background: #bb2d3b;
        color: #fff;
    }

    .admin-panel {
        background: rgba(255, 255, 255, 0.92);
        border: 1px solid rgba(148, 163, 184, 0.22);
        border-radius: 18px;
        box-shadow: 0 14px 28px rgba(15, 23, 42, 0.08);
        padding: 18px 18px 8px;
    }

    .admin-table-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 12px;
        margin-bottom: 14px;
    }

    .admin-entries-control,
    .admin-search-wrap {
        display: flex;
        align-items: center;
        gap: 6px;
        color: #343a40;
        font-size: 0.9rem;
    }

    .admin-search-wrap input {
        width: 160px;
        padding: 0.35rem 0.5rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background: #fff;
        color: #212529;
    }

    .admin-entries-control select {
        padding: 0.3rem 0.4rem;
        border: 1px solid #ced4da;
        border-radius: 4px;
        background: #fff;
    }

    .admin-btn-secondary {
        border: 1px solid #0d6efd;
        background: #0d6efd;
        color: #fff;
        padding: 0.35rem 0.65rem;
        border-radius: 4px;
        font-weight: 700;
    }

    .admin-btn-secondary:hover {
        border-color: #0b5ed7;
        background: #0b5ed7;
        color: #fff;
    }

    .table-responsive {
        overflow-x: auto;
    }

    .admin-table {
        width: 100%;
        border-collapse: collapse;
        min-width: 760px;
    }

    .admin-table th,
    .admin-table td {
        padding: 15px 14px;
        border-bottom: 1px solid rgba(148, 163, 184, 0.2);
        text-align: left;
        vertical-align: top;
    }

    .admin-table thead th {
        background: #f8fafc;
        color: #334155;
        font-size: 0.82rem;
        letter-spacing: 0.04em;
        text-transform: uppercase;
        font-weight: 800;
    }

    .project-title-cell {
        font-weight: 700;
        color: #0f172a;
    }

    .project-thumbnail {
        display: block;
        width: 64px;
        height: 64px;
        border: 1px solid #dee2e6;
        border-radius: 4px;
        object-fit: cover;
    }

    .project-description-cell {
        color: #475569;
        line-height: 1.6;
        max-width: 320px;
    }

    .status-badge {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        min-width: 92px;
        padding: 7px 10px;
        border-radius: 999px;
        font-size: 0.74rem;
        font-weight: 700;
        color: #fff;
    }

    .status-active {
        background: linear-gradient(135deg, #22c55e, #16a34a);
    }

    .status-archived {
        background: linear-gradient(135deg, #a78bfa, #7c3aed);
    }

    .status-draft {
        background: linear-gradient(135deg, #f59e0b, #ef4444);
    }

    .action-cell {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
    }

    .btn-table {
        border: 0;
        border-radius: 8px;
        padding: 8px 12px;
        font-size: 0.75rem;
        font-weight: 700;
        transition: opacity 0.2s ease;
    }

    .btn-table:hover {
        opacity: 0.92;
    }

    .btn-table--view {
        background: #dbeafe;
        color: #1d4ed8;
    }

    .btn-table--danger {
        background: #fee2e2;
        color: #b91c1c;
    }

    .empty-state {
        padding: 28px 14px;
        text-align: center;
        color: #64748b;
        font-weight: 600;
    }

    .admin-pagination {
        padding-top: 16px;
        display: flex;
        justify-content: center;
    }

    .pagination {
        --bs-pagination-color: #1d4ed8;
        --bs-pagination-active-bg: #1d4ed8;
        --bs-pagination-active-border-color: #1d4ed8;
        --bs-pagination-hover-color: #1d4ed8;
        --bs-pagination-hover-bg: #eff6ff;
    }

    @media (max-width: 767.98px) {
        .admin-content {
            padding: 18px 14px 24px;
        }

        .admin-topbar {
            flex-direction: column;
            align-items: flex-start;
        }

        .admin-topbar__actions {
            width: 100%;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .admin-table-tools {
            align-items: flex-start;
            flex-wrap: wrap;
        }

        .admin-search-wrap {
            margin-left: auto;
        }

        .admin-search-wrap input {
            width: min(38vw, 160px);
        }
    }
</style>
@endsection