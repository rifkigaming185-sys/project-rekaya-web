@extends('layouts.app')

@section('title', 'Data Project PDF')

@section('content')
<main class="project-report">
    <header class="project-report__header">
        <div>
            <h1>Data Project</h1>
            <p>Program Studi Sistem Informasi - Universitas Pamulang</p>
        </div>
        <button type="button" class="btn btn-danger" onclick="window.print()">Cetak / Simpan PDF</button>
    </header>

    <table class="project-report__table">
        <thead>
            <tr>
                <th>No</th>
                <th>Image</th>
                <th>Title</th>
                <th>Teknologi</th>
                <th>Description</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($projects as $project)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        @if ($project->image)
                            <img src="{{ asset('images/' . $project->image) }}" alt="Gambar {{ $project->title }}">
                        @else
                            —
                        @endif
                    </td>
                    <td>{{ $project->title }}</td>
                    <td>{{ $project->teknologi }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ ucfirst($project->status ?? 'active') }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">Belum ada project.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</main>

<style>
    .project-report {
        padding: 28px;
        color: #212529;
        font-family: Arial, sans-serif;
    }

    .project-report__header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
        margin-bottom: 24px;
    }

    .project-report__header h1 {
        margin: 0 0 6px;
        font-size: 1.5rem;
    }

    .project-report__header p {
        margin: 0;
        color: #6c757d;
    }

    .project-report__table {
        width: 100%;
        border-collapse: collapse;
        font-size: 0.85rem;
    }

    .project-report__table th,
    .project-report__table td {
        padding: 8px;
        border: 1px solid #dee2e6;
        text-align: left;
        vertical-align: top;
    }

    .project-report__table th {
        background: #f1f3f5;
    }

    .project-report__table img {
        width: 56px;
        height: 56px;
        object-fit: cover;
    }

    @media print {
        @page {
            size: landscape;
            margin: 12mm;
        }

        .project-report {
            padding: 0;
        }

        .project-report__header .btn {
            display: none;
        }

        .project-report__table tr {
            break-inside: avoid;
        }
    }
</style>

<script>
    window.addEventListener('load', function () {
        window.print();
    });
</script>
@endsection
