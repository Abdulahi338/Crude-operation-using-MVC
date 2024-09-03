<!DOCTYPE html>
<html>
<head>
    <title>Create Task</title>
</head>
<body>
    <h1>Create Task</h1>
    <form action="{{ route('tasks.store') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description"></textarea>
        <br>
        <button type="submit">Save Task</button>
    </form>
    <a href="{{ route('tasks.index') }}">Back to Task List</a>
</body>
</html>
