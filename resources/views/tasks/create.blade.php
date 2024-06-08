@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Create Task for Project: {{ $project->name }}</h1>
        <form action="{{ route('tasks.store', $project->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Task</button>
        </form>
    </div>
@endsection
