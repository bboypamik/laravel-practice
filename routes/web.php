<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/todos', [TodoController::class, 'index'])->name('todos');
//Route::get('/todos/create', [TodoController::class, 'create']);
//Route::post('/todos/create', [TodoController::class, 'store']);
//Route::patch('/todos/{todo}/update', [TodoController::class, 'update'])->name('todo.update');
//Route::get('/todos/{todo}/edit', [TodoController::class, 'edit']);
//Route::delete('/todos/{todo}/delete', [TodoController::class, 'destroy'])->name('todo.destroy');

// another test command

Route::resource('/todo', TodoController::class);
Route::put('/todo/{todo}/complete', [TodoController::class, 'complete'])->name('todo.complete');


Route::get('/', function () {

    return view('/welcome');
});

Route::get('/user', [UserController::class, 'index']);

Route::post('/upload', [UserController::class, 'uploadAvatar'])->name('upload');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

