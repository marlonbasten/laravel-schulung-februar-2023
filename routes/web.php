<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;
use Jumbojett\OpenIDConnectClient;
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

Route::get('/login-oidc', function () {
    // login with gitlab using openid connect
    $oidc = new OpenIDConnectClient('https://gitlab.com');
    $oidc->setClientID('8267c20483941ea4a3ec53c5f2c911690625f1e21e47c1dff50ca7852f5d5938');
    $oidc->setClientSecret('53b6d66ee693ddb41f6ccef26db82f444efe185f7e634c03263d0d7bdb0b742d');
    $oidc->setRedirectURL('http://localhost/oidc-webhook');
    $oidc->addScope(['openid', 'profile', 'email']);
    $oidc->authenticate();
});

Route::get('/oidc-webhook', function () {
    $oidc = new OpenIDConnectClient(
        'https://gitlab.com',
        '8267c20483941ea4a3ec53c5f2c911690625f1e21e47c1dff50ca7852f5d5938',
        '53b6d66ee693ddb41f6ccef26db82f444efe185f7e634c03263d0d7bdb0b742d'
    );
    $name = $oidc->token('nickname');

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

Route::get('/switch-language/{locale}', function (string $locale) {
    session()->put('locale', $locale);
    return redirect()->back();
})->name('switch-language');
