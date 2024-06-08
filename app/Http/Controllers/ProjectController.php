<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the projects.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Retrieve all projects from the database
        $projects = Project::all();

        // Return the index view with the list of projects
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new project.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Return the create view
        return view('projects.create');
    }

    /**
     * Store a newly created project in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required'
        ]);

        // Create a new project with the validated data
        Project::create($request->all());

        // Redirect to the projects index page
        return redirect()->route('projects.index');
    }

    /**
     * Display the specified project and its associated tasks.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function show(Project $project)
    {
        // Retrieve tasks associated with the project, ordered by priority
        $tasks = $project->tasks()->orderBy('priority')->get();

        // Return the show view with the project and its tasks
        return view('projects.show', compact('project', 'tasks'));
    }

    /**
     * Show the form for editing the specified project.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function edit(Project $project)
    {
        // Return the edit view with the project
        return view('projects.edit', compact('project'));
    }

    /**
     * Update the specified project in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required'
        ]);

        // Update the project with the validated data
        $project->update($request->all());

        // Redirect to the projects index page
        return redirect()->route('projects.index');
    }

    /**
     * Remove the specified project from the database.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project)
    {
        // Delete the project
        $project->delete();

        // Redirect to the projects index page
        return redirect()->route('projects.index');
    }
}
