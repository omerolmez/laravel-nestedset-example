<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LogController;
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

Route::get('/', function () {
    return redirect()
        ->route('category.index');
});

Route::resource('product', ProductController::class)->except(['show']);
Route::resource('category', CategoryController::class)->except(['show']);
Route::get('logs', [LogController::class, 'index'])->name('logs.index');
