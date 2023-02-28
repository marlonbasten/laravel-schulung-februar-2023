<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hallo/{name?}', [HomeController::class, 'index'])->name('homepage');

Route::prefix('/kontakt')->name('contact.')->controller(ContactController::class)->group(function () {
    // Route::prefix('/test')->group(function () {
    // });

    Route::get('/', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});

// Route::resource('/kontakt', ContactController::class)->only(['create','store']);

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
