<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasiensController;
use App\Http\Controllers\UserController;

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

Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'login'])->name('login.store');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/register', [RegisterController::class, 'index']);
// Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/dashboard', [DashboardController::class, 'index']);

// Route::middleware(['auth', 'user-access:admin'])->group(function () {
//     Route::resources([
//         'users' => UserController::class,
//     ]);
// });

Route::resources([
    'users' => UserController::class,
]);
Route::resources([
    'pasiens' => PasiensController::class
]);

// Route::middleware(['auth'])->group(function () {
//     Route::resources([
//         'pasiens' => PasiensController::class
//     ]);
// });
