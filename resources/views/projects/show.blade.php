@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <a href="{{ route('tasks.create', $project) }}" class="btn btn-primary mb-3">Add Task</a>
    <ul class="list-group" id="task-list">
        @foreach ($tasks as $task)
            <li class="list-group-item">
                <a>{{ $task->name }}</a>
                <div class="float-right">
                    <a href="{{ route('tasks.edit', [$project, $task]) }}" class="btn btn-sm btn-secondary">Edit</a>
                    <form action="{{ route('tasks.destroy', [$project, $task]) }}" method="POST" style="display:inline;">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
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
