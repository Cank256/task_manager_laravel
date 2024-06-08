@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Task for Project: {{ $project->name }}</h1>
        <form action="{{ route('tasks.update', [$project->id, $task->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Task Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $task->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Task</button>
        </form>
    </div>
@endsection
