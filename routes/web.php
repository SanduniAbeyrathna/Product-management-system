<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\CategoryController;


//Home
Route::get('/', [HomeController::class, 'index'])->name('home');

//Relationship
Route::get('/relationship', [HomeController::class, 'relationship'])->name('relationship');

//resource controller is used for the 'todo' route
// Route::resource('todo', TodoController::class);

//Todo
Route::prefix('/todo')->group(function () {
    Route::get('/', [TodoController::class, 'index'])->name('todo.index');
    Route::post('/store', [TodoController::class, 'store'])->name('todo.store');
    Route::get('/edit', [TodoController::class, 'edit'])->name('todo.edit');
    Route::post('/{task_id}/update', [TodoController::class, 'update'])->name('todo.update');
    Route::get('/{task_id}/delete', [TodoController::class, 'delete'])->name('todo.delete');
    Route::get('/{task_id}/ststus', [TodoController::class, 'status'])->name('todo.status');
    Route::get('/{task_id}/subtask', [TodoController::class, 'subTask'])->name('todo.subtask');
    Route::post('/subtask/store', [TodoController::class, 'subTaskStore'])->name('todo.subtask.store');
});

//Banner
Route::prefix('/banner')->group(function () {
    Route::get('/', [BannerController::class, 'index'])->name('banner.index');
    Route::post('/store', [BannerController::class, 'store'])->name('banner.store');
    Route::get('/{banner_id}/delete', [BannerController::class, 'delete'])->name('banner.delete');
    Route::get('/{banner_id}/status', [BannerController::class, 'status'])->name('banner.status');
});

//Permissions
// Route::resource('/permissions', PermissionController::class, ['except' => [ 'destroy']]);
Route::prefix('/permissions')->group(function () {
    Route::get('/', [PermissionController::class, 'index'])->name('permissions.index');
    Route::post('/store', [PermissionController::class, 'store'])->name('permissions.store');
    // Route::delete('/{id}/destroy', [PermissionController::class, 'destroy'])->name('permissions.destroy');
});

//Roles
Route::prefix('/roles')->group(function () {
    Route::get('/', [RoleController::class, 'index'])->name('roles.index');
    Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
});

//category
Route::prefix('/users')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('users.index');
    Route::post('/store', [CategoryController::class, 'store'])->name('users.store');
    Route::get('/edit/{id}/', [CategoryController::class, 'edit']);
    Route::post('/update', [CategoryController::class, 'update'])->name('users.update');
    Route::get('/destroy/{id}/', [CategoryController::class, 'destroy']);
});

// Route::get('/todo', [TodoController::class, 'index'])->name('todo');

// Route::get('/{id}/delete', [TodoController::class, 'delete'])->name('todo.delete');

// //status updated
// Route::get('/{id}/status',[TodoController::class,'status'])->name('todo.status');