<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectsController extends Controller
{
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    public function show(Project $project)
    {
        if(auth()->id() !== (int) $project->owner_id) {
            abort(403);
        }

        return view('projects.show', compact('project'));
    }

    public function create()
    {
        return view('projects.create');
    }

    public function store()
    {
        $attributes = request()->validate([
            'title' => 'required',
            'description' => 'required'
        ]);

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }
}
