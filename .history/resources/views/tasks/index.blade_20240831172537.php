<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            max-width: 1200px;
        }
        .task-list {
            border-radius: 0.75rem;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .task-list thead {
            background-color: #e9ecef;
        }
        .task-list th {
            text-align: center;
            color: #495057;
        }
        .task-list td {
            vertical-align: middle;
        }
        .badge-success {
            background-color: #28a745; /* Green */
        }
        .badge-danger {
            background-color: #dc3545; /* Red */
        }
        .btn-primary {
            background-color: #0d6efd; /* Blue */
            border: none;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
        }
        .btn-warning {
            background-color: #ffc107; /* Yellow */
            border: none;
        }
        .btn-warning:hover {
            background-color: #e0a800;
        }
        .btn-danger {
            background-color: #dc3545; /* Red */
            border: none;
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-secondary {
            background-color: #6c757d; /* Gray */
            border: none;
        }
        .btn-secondary:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Task List</h1>
            <a href="{{ route('tasks.create') }}" class="btn btn-primary">Add New Task</a>
        </div>
        <div class="table-responsive">
            <table class="table table-striped task-list">
                <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Status</th>
                        <th scope="col" style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tasks as $task)
                        <tr>
                            <td>{{ $task->title }}</td>
                            <td>{{ $task->description }}</td>
                            <td>
                                @if ($task->completed)
                                    <span class="badge bg-success">Completed</span>
                                @else
                                    <span class="badge bg-danger">Not Completed</span>
                                @endif
                            </td>
                            <td class="text-center">
                                <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.min.js"></script>
</body>
</html>
