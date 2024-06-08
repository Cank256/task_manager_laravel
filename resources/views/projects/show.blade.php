@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $project->name }}</h1>
    <a href="{{ route('tasks.create', $project) }}" class="btn btn-primary mb-3">Add Task</a>
    <ul class="list-group tasks">
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

<script>
    document.addEventListener('DOMContentLoaded', () => {
        let el = document.getElementById('tasks');
        let sortable = Sortable.create(el, {
            onEnd: function (/**Event*/evt) {
                let order = sortable.toArray();
                axios.post('{{ route('tasks.reorder', $project) }}', {
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
