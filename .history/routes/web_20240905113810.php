<?php

use App\Http\Controllers\TaskController;

// Resource routes for CRUD operations
Route::resource('tasks', TaskController::class);

// Route for restoring soft-deleted tasks

// Route for listing trashed tasks
Route::get('/tasks/trashed', [TaskController::class, 'trashed'])->name('tasks.trashed');
