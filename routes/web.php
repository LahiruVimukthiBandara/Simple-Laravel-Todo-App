<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[TaskController::class,'index']);

Route::get('/tasks',[TaskController::class,'index']);

Route::post('/tasks',[TaskController::class,'store']);

Route::patch('tasks/{id}',[TaskController::class,'update']);

Route::delete('tasks/{id}',[TaskController::class,'delete']);

Route::get('edit/{id}',[TaskController::class,'edit']);
Route::put('editdata/{id}',[TaskController::class,'editdata']);

Route::get('create',[TaskController::class,'create']);


