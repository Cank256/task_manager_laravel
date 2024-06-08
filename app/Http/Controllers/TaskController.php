<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\Project;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Show the form for creating a new task.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\View\View
     */
    public function create(Project $project)
    {
        // Return the create view with the specified project
        return view('tasks.create', compact('project'));
    }

    /**
     * Store a newly created task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Project $project)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
        ]);

        // Create a new task associated with the project
        $project->tasks()->create([
            'name' => $request->name,
            'priority' => $project->tasks()->count() + 1,
        ]);

        // Redirect to the project's show page
        return redirect()->route('projects.show', $project);
    }

    /**
     * Show the form for editing the specified task.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\View\View
     */
    public function edit(Project $project, Task $task)
    {
        // Return the edit view with the specified project and task
        return view('tasks.edit', compact('project', 'task'));
    }

    /**
     * Update the specified task in the database.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Project $project, Task $task)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required',
        ]);

        // Update the task with the validated data
        $task->update($request->all());

        // Redirect to the project's show page
        return redirect()->route('projects.show', $project);
    }

    /**
     * Remove the specified task from the database.
     *
     * @param  \App\Models\Project  $project
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Project $project, Task $task)
    {
        // Delete the task
        $task->delete();

        // Redirect to the project's show page
        return redirect()->route('projects.show', $project);
    }

    /**
     * Reorder the tasks based on the new order from the frontend.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\JsonResponse
     */
    public function reorder(Request $request, Project $project)
    {
        // Get the new order of tasks from the request
        $tasks = $request->tasks;

        // Update the priority of each task based on the new order
        foreach ($tasks as $index => $taskId) {
            $task = Task::find($taskId);
            $task->priority = $index + 1;
            $task->save();
        }

        // Return a JSON response indicating success
        return response()->json(['status' => 'success']);
    }
}
