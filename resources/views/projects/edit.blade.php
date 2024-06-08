@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Project</h1>
        <form action="{{ route('projects.update', $project->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Project Name:</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ $project->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
