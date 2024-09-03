<?php

// use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

use App\Http\Controllers\TaskController;

Route::resource('tasks', TaskController::class);

