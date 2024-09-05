@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create New Task</a>

        <h2>Tasks</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->completed ? 'Yes' : 'No' }}</td>
                        <td>
                            @if($task->deleted_at)
                                <form action="{{ route('tasks.restore', $task->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Restore</button>
                                </form>
                            @else
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning">Edit</a>

                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
