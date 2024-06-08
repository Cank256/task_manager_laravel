@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Tasks for Project: {{ $project->name }}</h1>
        <a href="{{ route('tasks.create', $project->id) }}" class="btn btn-primary mb-3">Add Task</a>
        <ul id="task-list" class="list-group">
            @foreach ($tasks as $task)
                <li class="list-group-item" data-id="{{ $task->id }}">
                    {{ $task->name }}
                    <div class="float-right">
                        <a href="{{ route('tasks.edit', [$project->id, $task->id]) }}" class="btn btn-sm btn-secondary">Edit</a>
                        <form action="{{ route('tasks.destroy', [$project->id, $task->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-ui/1.12.1/jquery-ui.min.js"></script>
    <script>
        $(function() {
            $("#task-list").sortable({
                update: function(event, ui) {
                    var order = $(this).sortable('toArray', { attribute: 'data-id' });
                    $.ajax({
                        url: '{{ route('tasks.reorder', $project->id) }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            tasks: order
                        },
                        success: function(response) {
                            console.log('Tasks reordered successfully');
                        }
                    });
                }
            });
            $("#task-list").disableSelection();
        });
    </script>
@endsection
