<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;

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

Route::get('/login-github', function () {
    return Socialite::driver('github')->redirect();
});

Route::get('/sso-callback', function () {
   $ssoUser = Socialite::driver('github')->user();

   $user = User::firstOrCreate([
       'sso_id' => $ssoUser->getId(),
   ], [
       'name' => $ssoUser->getName(),
       'email' => $ssoUser->getEmail(),
       'email_verified_at' => Carbon::now(),
       'password' => \Illuminate\Support\Facades\Hash::make(\Illuminate\Support\Str::password()),
    ]);

   auth()->login($user);
   return redirect()->route('home');
});
