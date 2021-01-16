<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Project;

class ProjectsController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function index()
    {
        $projects = auth()->user()->projects;

        return view('projects.index', compact('projects'));
    }

    /**
     * @param Project $project
     * @return \Illuminate\Contracts\View\Factory
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Project $project)
    {
        $this->authorize('update', $project);

        return view('projects.show', compact('project'));
    }

    public function edit(Project $project)
    {

        return view('projects.edit', compact('project'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $attributes = $this->validateRequest();

        $project = auth()->user()->projects()->create($attributes);

        return redirect($project->path());
    }

    /**
     *
     * @param Project $project
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Project $project)
    {
        $this->authorize('update', $project);

        $attributes = $this->validateRequest();

        $project->update($attributes);

        return redirect($project->path());
    }

    protected function validateRequest()
    {
        return request()->validate([
            'title' => 'required',
            'description' => 'required',
            'notes' => 'min:3'
        ]);;
    }
}
