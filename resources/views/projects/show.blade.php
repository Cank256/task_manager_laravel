@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <a href="{{ route('projects.tasks.create', $project) }}" class="btn btn-primary">Add Task</a>
    <ul id="tasks">
        @foreach ($tasks as $task)
            <li data-id="{{ $task->id }}">{{ $task->name }}
                <form action="{{ route('projects.tasks.destroy', [$project, $task]) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let el = document.getElementById('tasks');
        let sortable = Sortable.create(el, {
            onEnd: function (/**Event*/evt) {
                let order = sortable.toArray();
                axios.post('{{ route('projects.tasks.reorder', $project) }}', {
                    tasks: order
                }).then(response => {
                    console.log(response.data);
                });
            },
            dataIdAttr: 'data-id',
        });
    });
</script>
@endsection
