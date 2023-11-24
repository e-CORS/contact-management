<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/', [ContactController::class, 'index',]);

Route::get('/login', function () {
    return Inertia::render('Auth/Login');
});

Route::get('/contact', [ContactController::class, 'index',])->name('contact.index');
Route::get('/contact/edit', [ContactController::class, 'edit'])->name('contact.edit');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
