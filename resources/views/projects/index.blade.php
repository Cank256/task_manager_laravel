@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Projects</h1>
        <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Create Project</a>
        <ul class="list-group">
            @foreach ($projects as $project)
                <li class="list-group-item">
                    <a href="{{ route('projects.show', $project->id) }}">{{ $project->name }}</a>
                    <div class="float-right">
                        <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('projects.destroy', $project->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
