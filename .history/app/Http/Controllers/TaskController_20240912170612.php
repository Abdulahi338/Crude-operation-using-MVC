<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    // Display a listing of the tasks.
    public function index()
    {
        // Fetch only non-deleted tasks
        $tasks = Task::whereNull('deleted_at')->get();
        return view('tasks.index', 'tasks'=>$ta compact('tasks'));
    }

    // Show the form for creating a new task.
    public function create()
    {
        return view('tasks.create');
    }

    // Store a newly created task in storage.
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    // Display the specified task.
    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));
    }

    // Show the form for editing the specified task.
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    // Update the specified task in storage.
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    // Remove the specified task from storage.
    public function destroy(Task $task)
    {
        $task->delete(); // Soft delete
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    // Restore a soft-deleted task.
    public function restore($id)
    {
        $task = Task::onlyTrashed()->findOrFail($id);

        if ($task) {
            $task->restore();
            return redirect()->route('tasks.index')->with('success', 'Task restored successfully.');
        }

        return redirect()->route('tasks.index')->with('error', 'Task not found.');
    }

    
    public function trashed()
    {
        $tasks = Task::onlyTrashed()->get();
        return view('tasks.trashed', compact('tasks'));
    }
    public function restoreAll()
    {
        Task::onlyTrashed()->restore(); 
        return redirect()->route('tasks.trashed')->with('success', 'All trashed tasks have been restored.');
    }
}
