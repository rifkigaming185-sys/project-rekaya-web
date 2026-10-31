<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        $projects = Project::paginate(6);

        return view('page.project', compact('projects'))->with('hideLayoutShell', true);
    }

    public function create()
    {
        return view('page.project-create')->with('hideLayoutShell', true);
    }

    public function show($id)
    {
        $project = Project::findOrFail($id);
        return view('page.project-detail', compact('project'));
    }
}