<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KajianPasienController;
use App\Http\Controllers\PasiensController;
use App\Http\Controllers\PelayananPasienController;
use App\Http\Controllers\UnitPelayananBpUmumController;
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

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resources([
        'pasiens' => PasiensController::class
    ]);
    Route::get('/pdf-view-pasien/{pasien}', [PasiensController::class, 'pdf'])->name('pdf-pasien');

    Route::resources([
        'pelayanan-pasiens' => PelayananPasienController::class
    ]);

    Route::get('/kajian-pasien', [KajianPasienController::class, 'index'])->name('kajian-pasiens.index');
    Route::get('/kajian-pasien/create', [KajianPasienController::class, 'create'])->name('kajian-pasiens.create');
    Route::post('/kajian-pasien', [KajianPasienController::class, 'store'])->name('kajian-pasiens.store');
    Route::get('/kajian-pasien/{kajian_pasien:pasiens_no_rm}', [KajianPasienController::class, 'show'])->name('kajian-pasiens.show');
    Route::get('/kajian-pasien/{kajian_pasien:pasiens_no_rm}/edit', [KajianPasienController::class, 'edit'])->name('kajian-pasiens.edit');
    Route::put('/kajian-pasien/{kajian_pasien:pasiens_no_rm}', [KajianPasienController::class, 'update'])->name('kajian-pasiens.update');
    Route::delete('/kajian-pasien/{kajian_pasien}', [KajianPasienController::class, 'destroy'])->name('kajian-pasiens.destroy');
    Route::get('/pdf-view-kajian-pasien/{kajian_pasiens}', [KajianPasienController::class, 'pdf'])->name('pdf-kajian-pasien');

    Route::middleware(['user-access:admin'])->group(function () {
        Route::resources([
            'users' => UserController::class,
        ]);
        Route::prefix('admin-bp-umum')->group(function () {
            Route::get('/', [UnitPelayananBpUmumController::class, 'index'])->name('admin-bp-umum.index');
            Route::get('/create', [UnitPelayananBpUmumController::class, 'create'])->name('admin-bp-umum.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpUmumController::class, 'status'])->name('admin-bp-umum.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpUmumController::class, 'periksa'])->name('admin-bp-umum.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpUmumController::class, 'store'])->name('admin-bp-umum.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'show'])->name('admin-bp-umum.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpUmumController::class, 'edit'])->name('admin-bp-umum.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'update'])->name('admin-bp-umum.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'destroy'])->name('admin-bp-umum.destroy');
        });
    });

    Route::middleware(['user-access:bp-umum'])->group(function () {
        Route::prefix('bp-umum')->group(function () {
            Route::get('/', [UnitPelayananBpUmumController::class, 'index'])->name('bp-umum.index');
            Route::get('/create', [UnitPelayananBpUmumController::class, 'create'])->name('bp-umum.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpUmumController::class, 'status'])->name('bp-umum.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpUmumController::class, 'periksa'])->name('bp-umum.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpUmumController::class, 'store'])->name('bp-umum.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'show'])->name('bp-umum.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpUmumController::class, 'edit'])->name('bp-umum.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'update'])->name('bp-umum.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpUmumController::class, 'destroy'])->name('bp-umum.destroy');
        });
    });

    
});

