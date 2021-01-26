<?php

use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Route::prefix('admin/home')->group(function () {
//     Route::get('/', function () {
//     })->name('home.index');
//     Route::get('{id}/edit', function () {
//     })->name('home.edit');
//     Route::get('{id}', function () {
//     })->name('home.update');
// });


Route::get('admin/home', [HomeController::class,'handleAdmin'])->name('admin.route')->middleware('admin');
Route::resource('admin/home', RegisterController::class)->middleware('admin');
// Route::get('admin/homep/{id}', [RegisterController::class, 'edit'])->name('edit')->middleware('admin');
// Route::post('admin/home', [RegisterController::class, 'update'])->name('home.update')->middleware('admin');
// Route::get('admin/home', [RegisterController::class, 'index'])->name('home.index')->middleware('admin');

// Route::get('admin/home', [RegisterController::class, 'index'])->name('admin.route')->middleware('admin');
