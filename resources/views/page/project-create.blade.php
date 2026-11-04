@extends('layouts.app')

@section('title', 'Tambah Project')

@section('content')
@include('partials.admin-header')

<div class="admin-layout">
    @include('partials.admin-sidebar')

    <div class="admin-main">
        <main class="admin-content admin-dashboard">
            <header class="admin-topbar">
                <div>
                    <p class="admin-topbar__eyebrow">Admin Menu</p>
                    <h1>Tambah Project</h1>
                </div>

                <div class="admin-topbar__actions">
                    <span class="admin-campus">Prodi Sistem Informasi UNPAM</span>
                </div>
            </header>

            <section class="admin-panel admin-form-panel">
                <form class="project-form">
                    <div class="form-grid">
                        <div class="field-group field-full">
                            <label for="project-title">Title</label>
                            <input id="project-title" type="text" placeholder="Masukkan judul project" />
                        </div>

                        <div class="field-group">
                            <label for="project-technology">Teknologi</label>
                            <input id="project-technology" type="text" placeholder="Contoh: Laravel, React, Node.js" />
                        </div>

                        <div class="field-group">
                            <label for="project-status">Status</label>
                            <select id="project-status">
                                <option value="active">Active</option>
                                <option value="draft">Draft</option>
                                <option value="archived">Archived</option>
                            </select>
                        </div>

                        <div class="field-group field-full">
                            <label for="project-desc">Description</label>
                            <textarea id="project-desc" rows="5" placeholder="Masukkan deskripsi project"></textarea>
                        </div>

                        <div class="field-group field-full">
                            <label for="project-image">Image</label>
                            <input id="project-image" type="file" />
                        </div>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn admin-btn-primary">Simpan</button>
                        <a href="{{ route('project.index') }}" class="btn admin-btn-secondary">Batal</a>
                    </div>
                </form>
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
        background: #f3f5f8;
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
        text-decoration: none;
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

    .admin-form-panel {
        padding: 22px 20px 20px;
    }

    .project-form {
        width: 100%;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(2, minmax(0, 1fr));
        gap: 18px 20px;
    }

    .field-group {
        display: flex;
        flex-direction: column;
        gap: 8px;
    }

    .field-full {
        grid-column: 1 / -1;
    }

    .field-group label {
        font-size: 0.85rem;
        font-weight: 700;
        color: #334155;
    }

    .field-group input,
    .field-group select,
    .field-group textarea {
        width: 100%;
        padding: 0.85rem 0.95rem;
        border: 1px solid rgba(148, 163, 184, 0.55);
        border-radius: 10px;
        background: #f8fafc;
        color: #111827;
    }

    .field-group textarea {
        resize: vertical;
        min-height: 120px;
    }

    .form-actions {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 24px;
    }

    .admin-btn-secondary {
        border: 1px solid rgba(59, 130, 246, 0.2);
        background: #eff6ff;
        color: #1d4ed8;
        padding: 0.72rem 1.1rem;
        border-radius: 10px;
        font-weight: 700;
        text-decoration: none;
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

        .form-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection
