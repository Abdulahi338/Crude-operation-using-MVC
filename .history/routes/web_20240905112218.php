<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);
Route::post('/tasks/{task}/restore', [TaskController::class, 'restore'])->name('tasks.restore');


