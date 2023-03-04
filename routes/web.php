<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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

Route::get('/', [TodoController::class, 'show'])->name('home');
Route::post('/added', [TodoController::class, 'add'])->name('add');
Route::post('/change-status/{id}', [TodoController::class, 'change_status'])->name('change-status');
Route::get('/edit/{id}', [TodoController::class, 'edit'])->name('edit');
Route::post('/edit/{id}', [TodoController::class, 'edit_check'])->name('edit-check');
Route::get('/delete/{id}', [TodoController::class, 'delete'])->name('delete');