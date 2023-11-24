<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ContactController;
use Inertia\Inertia;
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

Route::get('/', [ContactController::class, 'index'])->middleware('auth');

$loginRoute = "/login";
Route::get($loginRoute, function () {
    return Inertia::render('Auth/Login');
});

Route::post($loginRoute, function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);
    if (Auth::attempt($credentials)) {
        request()->session()->regenerate();
        return redirect('/');
    }
    return redirect('/login')->withErrors([
        'email' => 'The provided credentials do not match our records.',
    ]);
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

Route::get('/contact', [ContactController::class, 'index',])->name('contact.index');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
