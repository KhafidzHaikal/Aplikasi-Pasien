<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KajianPasienController;
use App\Http\Controllers\PasiensController;
use App\Http\Controllers\PelayananPasienController;
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
Route::get('/pdf-view-pasien/{pasien}', [PasiensController::class, 'pdf'])->name('pdf-pasien');

Route::resources([
    'pasiens' => PasiensController::class
]);
Route::resources([
    'pelayanan-pasiens' => PelayananPasienController::class
]);

Route::get('/kajian-pasien', [KajianPasienController::class, 'index'])->name('kajian-pasiens.index');
Route::get('/kajian-pasien/create', [KajianPasienController::class, 'create'])->name('kajian-pasiens.create');
Route::post('/kajian-pasien', [KajianPasienController::class, 'store'])->name('kajian-pasiens.store');
Route::get('/kajian-pasien/{kajian_pasien:pasiens_no_rm}', [KajianPasienController::class, 'show'])->name('kajian-pasiens.show');
Route::get('/kajian-pasien/{kajian_pasien:pasiens_no_rm}/edit', [KajianPasienController::class, 'edit'])->name('kajian-pasiens.edit');
Route::put('/kajian-pasien/{kajian_pasien:pasiens_no_rm}', [KajianPasienController::class, 'update'])->name('kajian-pasiens.update');
Route::delete('/kajian-pasien{kajian_pasien}', [KajianPasienController::class, 'destroy'])->name('kajian-pasiens.destroy');
Route::get('/pdf-view-kajian-pasien/{kajian_pasiens}', [KajianPasienController::class, 'pdf'])->name('pdf-kajian-pasien');

// Route::middleware(['auth'])->group(function () {
//     Route::resources([
//         'pasiens' => PasiensController::class
//     ]);
// });
