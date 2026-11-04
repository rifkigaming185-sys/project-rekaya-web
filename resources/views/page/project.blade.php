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
                </div>
            </header>

            <section class="admin-panel">
                <div class="admin-table-tools">
                    <div class="admin-search-wrap">
                        <label for="project-search" class="visually-hidden">Search</label>
                        <input id="project-search" type="search" placeholder="Search:" />
                    </div>
                    <button type="button" class="btn admin-btn-secondary">Search</button>
                </div>

                <div class="table-responsive">
                    <table class="admin-table">
                        <thead>
                            <tr>
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
                                    <td colspan="5" class="empty-state">Belum ada project.</td>
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

    .admin-btn-primary {
        border: 0;
        background: linear-gradient(135deg, #f59e0b, #ed8d00);
        color: #fff;
        padding: 0.72rem 1.2rem;
        border-radius: 10px;
        font-weight: 700;
        box-shadow: 0 12px 20px rgba(245, 158, 11, 0.2);
    }

    .admin-btn-primary:hover {
        color: #fff;
        background: linear-gradient(135deg, #f59e0b, #d97706);
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

    .admin-search-wrap {
        flex: 1;
    }

    .admin-search-wrap input {
        width: 100%;
        max-width: 260px;
        padding: 0.7rem 0.9rem;
        border: 1px solid rgba(148, 163, 184, 0.5);
        border-radius: 10px;
        background: #f9fafb;
        color: #1f2937;
    }

    .admin-btn-secondary {
        border: 1px solid rgba(59, 130, 246, 0.2);
        background: #eff6ff;
        color: #1d4ed8;
        padding: 0.7rem 1rem;
        border-radius: 10px;
        font-weight: 700;
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
            flex-direction: column;
            align-items: stretch;
        }

        .admin-search-wrap input {
            max-width: 100%;
        }
    }
</style>
@endsection