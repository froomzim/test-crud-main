<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductsController;
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
Auth::routes();

Route::controller(HomeController::class)->group(function() {
    Route::get('/', 'index')->name('welcome');
    Route::get('/menu', 'home')->name('home');
});


Route::resource('produtos', ProductsController::class);
Route::resource('categorias', CategoryController::class);
