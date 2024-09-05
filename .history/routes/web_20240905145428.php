<?php
use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

// Route for restoring soft-deleted tasks
Route::post('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');

// Route for listing trashed tasks
Route::get('/tasks/trashed', [TaskController::class, 'trashed'])->name('tasks.trashed');
