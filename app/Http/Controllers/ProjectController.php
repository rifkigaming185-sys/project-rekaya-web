<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProjectController extends Controller
{
    public function index(Request $request): View
    {
        $filters = $request->validate([
            'search' => ['nullable', 'string', 'max:100'],
            'per_page' => ['sometimes', 'integer', 'in:10,25,50,100'],
        ]);
        $search = $filters['search'] ?? '';
        $perPage = (int) ($filters['per_page'] ?? 10);

        $projects = Project::query()
            ->when($search !== '', function (Builder $query) use ($search): void {
                $query->where(function (Builder $query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('teknologi', 'like', "%{$search}%")
                        ->orWhere('description', 'like', "%{$search}%")
                        ->orWhere('status', 'like', "%{$search}%");
                });
            })
            ->orderBy('id')
            ->paginate($perPage)
            ->withQueryString();

        return view('page.project', compact('projects', 'search', 'perPage'))
            ->with('hideLayoutShell', true);
    }

    public function pdf(): View
    {
        $projects = Project::query()
            ->orderBy('id')
            ->get();

        return view('page.project-pdf', compact('projects'))->with('hideLayoutShell', true);
    }

    public function create(): View
    {
        return view('page.project-create')->with('hideLayoutShell', true);
    }

    public function show(int $id): View
    {
        $project = Project::findOrFail($id);

        return view('page.project-detail', compact('project'));
    }
}
