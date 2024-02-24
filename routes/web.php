<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegistrationController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    return view('auth.register');
});

Route::get('/browser/js/disabled', function () {
    return view('errors.js_disabled');
})->name('js_disabled');

Route::get('session/check', [LoginController::class, 'session_check']);

Route::post('do_login', [LoginController::class, 'do_login'])->name('do_login');
Route::get('login', [LoginController::class, 'index'])->name('login');

Route::POST('do_register', [RegistrationController::class, 'store'])->name('do_register');
Route::get('register', [LoginController::class, 'register'])->name('register');

Route::get('/logout', [LoginController::class, 'admin_logout'])->name('logout');

Route::get('/', function () {
    return view('dashboards.main');
})->name('main_dashboard');

Route::get('/booking', function () {return view('pages.booking.index');})->name('booking.index');
Route::get('booking/add', function () {return view('pages.booking.create_edit');})->name('booking.create');
Route::get('booking/edit/{id}', function (Request $request) {$id = $request->id;return view('pages.booking.create_edit', compact('id'));})->name('booking.edit');


