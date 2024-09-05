<?php
use App\Http\Controllers\TaskController;

// Define routes
Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');
Route::get('/tasks.trashed', [TaskController::class, 'trashed'])->name('tasks.trashed');
Route::post('/tasks/restore-all', [TaskController::class, 'restoreAll'])->name('tasks.restore.all');

