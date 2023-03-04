<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\apicontroller;
use App\Http\Controllers\tagcontroller;
use App\Http\Controllers\colorcontroller;
use App\Http\Controllers\logcontroller;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/', [apicontroller::class, 'show'])->name('home-rest');
Route::post('/added', [apicontroller::class, 'add'])->name('add-rest');
Route::put('/edit/{id}', [apicontroller::class, 'edit'])->name('edit-rest');
Route::put('/change-status/{id}', [apicontroller::class, 'change_status'])->name('change-status');
Route::delete('/delete/{id}', [apicontroller::class, 'delete'])->name('delete-rest');


Route::prefix('tags')->group(function (){
    Route::get('/show', [tagcontroller::class, 'show'])->name('tags-show');
    Route::post('/added', [tagcontroller::class, 'add'])->name('tag-add');
    Route::put('/edit/{id}', [tagcontroller::class, 'edit'])->name('tag-edit');
    Route::put('/delete/{id}', [tagcontroller::class, 'delete'])->name('tag-delete');
});

Route::prefix('colors')->group(function (){
    Route::get('/show', [colorcontroller::class, 'show'])->name('color-show');
    // ДЛЯ РАЗРАБОТЧИКА //
    Route::post('/added', [colorcontroller::class, 'add'])->name('color-add');
    Route::put('/edit/{id}', [colorcontroller::class, 'edit'])->name('color-edit');
    Route::put('/delete/{id}', [colorcontroller::class, 'delete'])->name('color-delete');
    // ДЛЯ РАЗРАБОТЧИКА //
});

Route::prefix('logs')->group(function () {
    Route::get('/show', [logcontroller::class, 'show'])->name('logs-show');
});




