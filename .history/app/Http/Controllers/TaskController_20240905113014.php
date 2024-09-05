<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::whereNull('deleted_at')->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        Task::create($request->all());
        return redirect()->route('tasks.index');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $task->update($request->all());
        return redirect()->route('tasks.index');
    }

    public function destroy(Task $task)
    {
        $task->delete(); // Soft delete the task
        return redirect()->route('tasks.index');
    }

    public function restore($id)
    {
        $task = Task::onlyTrashed()->find($id);

        if ($task) {
            $task->restore(); // Restore the soft deleted task
            return redirect()->route('tasks.index')->with('success', 'Task restored successfully.');
        }

        return redirect()->route('tasks.index')->with('error', 'Task not found.');
    }
}
