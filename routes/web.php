<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FarmasiPasienController;
use App\Http\Controllers\KajianPasienController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PasiensController;
use App\Http\Controllers\PelayananPasienController;
use App\Http\Controllers\UnitPelayananBpGigiController;
use App\Http\Controllers\UnitPelayananBpLansiaController;
use App\Http\Controllers\UnitPelayananBpUmumController;
use App\Http\Controllers\UnitPelayananKiaController;
use App\Http\Controllers\UnitPelayananKonselingController;
use App\Http\Controllers\UnitPelayananMtbsController;
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
    Route::get('/pdf-view-kajian-pasien/{kajian_pasien:pasiens_no_rm}', [KajianPasienController::class, 'pdf'])->name('pdf-kajian-pasien');

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

        Route::prefix('admin-bp-gigi')->group(function () {
            Route::get('/', [UnitPelayananBpGigiController::class, 'index'])->name('admin-bp-gigi.index');
            Route::get('/create', [UnitPelayananBpGigiController::class, 'create'])->name('admin-bp-gigi.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpGigiController::class, 'status'])->name('admin-bp-gigi.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpGigiController::class, 'periksa'])->name('admin-bp-gigi.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpGigiController::class, 'store'])->name('admin-bp-gigi.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'show'])->name('admin-bp-gigi.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpGigiController::class, 'edit'])->name('admin-bp-gigi.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'update'])->name('admin-bp-gigi.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'destroy'])->name('admin-bp-gigi.destroy');
        });

        Route::prefix('admin-bp-lansia')->group(function () {
            Route::get('/', [UnitPelayananBpLansiaController::class, 'index'])->name('admin-bp-lansia.index');
            Route::get('/create', [UnitPelayananBpLansiaController::class, 'create'])->name('admin-bp-lansia.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpLansiaController::class, 'status'])->name('admin-bp-lansia.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpLansiaController::class, 'periksa'])->name('admin-bp-lansia.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpLansiaController::class, 'store'])->name('admin-bp-lansia.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'show'])->name('admin-bp-lansia.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpLansiaController::class, 'edit'])->name('admin-bp-lansia.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'update'])->name('admin-bp-lansia.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'destroy'])->name('admin-bp-lansia.destroy');
        });

        Route::prefix('admin-poli-kia')->group(function () {
            Route::get('/', [UnitPelayananKiaController::class, 'index'])->name('admin-poli-kia.index');
            Route::get('/create', [UnitPelayananKiaController::class, 'create'])->name('admin-poli-kia.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananKiaController::class, 'status'])->name('admin-poli-kia.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKiaController::class, 'periksa'])->name('admin-poli-kia.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKiaController::class, 'store'])->name('admin-poli-kia.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'show'])->name('admin-poli-kia.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananKiaController::class, 'edit'])->name('admin-poli-kia.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'update'])->name('admin-poli-kia.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'destroy'])->name('admin-poli-kia.destroy');
        });

        Route::prefix('admin-poli-mtbs')->group(function () {
            Route::get('/', [UnitPelayananMtbsController::class, 'index'])->name('admin-poli-mtbs.index');
            Route::get('/create', [UnitPelayananMtbsController::class, 'create'])->name('admin-poli-mtbs.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananMtbsController::class, 'status'])->name('admin-poli-mtbs.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananMtbsController::class, 'periksa'])->name('admin-poli-mtbs.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananMtbsController::class, 'store'])->name('admin-poli-mtbs.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'show'])->name('admin-poli-mtbs.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananMtbsController::class, 'edit'])->name('admin-poli-mtbs.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'update'])->name('admin-poli-mtbs.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'destroy'])->name('admin-poli-mtbs.destroy');
        });

        Route::prefix('admin-poli-konseling')->group(function () {
            Route::get('/', [UnitPelayananKonselingController::class, 'index'])->name('admin-poli-konseling.index');
            Route::get('/create', [UnitPelayananKonselingController::class, 'create'])->name('admin-poli-konseling.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananKonselingController::class, 'status'])->name('admin-poli-konseling.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKonselingController::class, 'periksa'])->name('admin-poli-konseling.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKonselingController::class, 'store'])->name('admin-poli-konseling.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'show'])->name('admin-poli-konseling.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananKonselingController::class, 'edit'])->name('admin-poli-konseling.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'update'])->name('admin-poli-konseling.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'destroy'])->name('admin-poli-konseling.destroy');
        });

        Route::prefix('admin-obat')->group(function () {
            Route::get('/', [ObatController::class, 'index'])->name('admin-obat.index');
            Route::get('/create', [ObatController::class, 'create'])->name('admin-obat.create');
            Route::post('/create', [ObatController::class, 'store'])->name('admin-obat.store');
            Route::get('/{obat}', [ObatController::class, 'show'])->name('admin-obat.show');
            Route::get('/{obat}/edit', [ObatController::class, 'edit'])->name('admin-obat.edit');
            Route::put('/{obat}', [ObatController::class, 'update'])->name('admin-obat.update');
            Route::delete('/{obat}', [ObatController::class, 'destroy'])->name('admin-obat.destroy');
        });

        Route::prefix('admin-farmasi')->group(function () {
            Route::get('/', [FarmasiPasienController::class, 'index'])->name('admin-farmasi.index');
            Route::get('/create', [FarmasiPasienController::class, 'create'])->name('admin-farmasi.create');
            Route::put('/create/{pelayanan_pasien}', [FarmasiPasienController::class, 'status'])->name('admin-farmasi.status');
            Route::get('/create/{pelayanan_pasien}/periksa', [FarmasiPasienController::class, 'periksa'])->name('admin-farmasi.periksa');
            Route::post('/create/{pelayanan_pasien}/periksa', [FarmasiPasienController::class, 'store'])->name('admin-farmasi.store');
            Route::get('/{farmasi}', [FarmasiPasienController::class, 'show'])->name('admin-farmasi.show');
            Route::get('/{farmasi}/edit', [FarmasiPasienController::class, 'edit'])->name('admin-farmasi.edit');
            Route::put('/{farmasi}', [FarmasiPasienController::class, 'update'])->name('admin-farmasi.update');
            Route::delete('/{farmasi}', [FarmasiPasienController::class, 'destroy'])->name('admin-farmasi.destroy');
        });
    });

    Route::get('/print-laporan-pasien/{tanggal_awal}/{tanggal_akhir}', [PasiensController::class, 'print'])->name('admin-pasiens.print');
    Route::get('/print-laporan-bp-umum/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananBpUmumController::class, 'print'])->name('admin-bp-umum.print');
    Route::get('/print-laporan-bp-gigi/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananBpGigiController::class, 'print'])->name('admin-bp-gigi.print');
    Route::get('/print-laporan-bp-lansia/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananBpLansiaController::class, 'print'])->name('admin-bp-gigi.print');
    Route::get('/print-laporan-poli-kia/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananKiaController::class, 'print'])->name('admin-bp-gigi.print');
    Route::get('/print-laporan-poli-mtbs/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananMtbsController::class, 'print'])->name('admin-bp-gigi.print');
    Route::get('/print-laporan-poli-konseling/{tanggal_awal}/{tanggal_akhir}', [UnitPelayananKonselingController::class, 'print'])->name('admin-bp-gigi.print');
    Route::get('/print-laporan-obat/{tanggal_awal}/{tanggal_akhir}', [ObatController::class, 'print'])->name('admin-obat.print');
    Route::get('/print-laporan-farmasi/{tanggal_awal}/{tanggal_akhir}', [FarmasiPasienController::class, 'print'])->name('admin-farmasi.print');

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

    Route::middleware(['user-access:bp-gigi'])->group(function () {
        Route::prefix('bp-gigi')->group(function () {
            Route::get('/', [UnitPelayananBpGigiController::class, 'index'])->name('bp-gigi.index');
            Route::get('/create', [UnitPelayananBpGigiController::class, 'create'])->name('bp-gigi.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpGigiController::class, 'status'])->name('bp-gigi.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpGigiController::class, 'periksa'])->name('bp-gigi.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpGigiController::class, 'store'])->name('bp-gigi.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'show'])->name('bp-gigi.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpGigiController::class, 'edit'])->name('bp-gigi.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'update'])->name('bp-gigi.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpGigiController::class, 'destroy'])->name('bp-gigi.destroy');
        });
    });

    Route::middleware(['user-access:bp-lansia'])->group(function () {
        Route::prefix('bp-lansia')->group(function () {
            Route::get('/', [UnitPelayananBpLansiaController::class, 'index'])->name('bp-lansia.index');
            Route::get('/create', [UnitPelayananBpLansiaController::class, 'create'])->name('bp-lansia.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananBpLansiaController::class, 'status'])->name('bp-lansia.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpLansiaController::class, 'periksa'])->name('bp-lansia.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananBpLansiaController::class, 'store'])->name('bp-lansia.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'show'])->name('bp-lansia.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananBpLansiaController::class, 'edit'])->name('bp-lansia.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'update'])->name('bp-lansia.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananBpLansiaController::class, 'destroy'])->name('bp-lansia.destroy');
        });
    });

    Route::middleware(['user-access:kia'])->group(function () {
        Route::prefix('poli-kia')->group(function () {
            Route::get('/', [UnitPelayananKiaController::class, 'index'])->name('poli-kia.index');
            Route::get('/create', [UnitPelayananKiaController::class, 'create'])->name('poli-kia.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananKiaController::class, 'status'])->name('poli-kia.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKiaController::class, 'periksa'])->name('poli-kia.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKiaController::class, 'store'])->name('poli-kia.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'show'])->name('poli-kia.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananKiaController::class, 'edit'])->name('poli-kia.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'update'])->name('poli-kia.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananKiaController::class, 'destroy'])->name('poli-kia.destroy');
        });
    });

    Route::middleware(['user-access:mtbs'])->group(function () {
        Route::prefix('poli-mtbs')->group(function () {
            Route::get('/', [UnitPelayananMtbsController::class, 'index'])->name('poli-mtbs.index');
            Route::get('/create', [UnitPelayananMtbsController::class, 'create'])->name('poli-mtbs.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananMtbsController::class, 'status'])->name('poli-mtbs.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananMtbsController::class, 'periksa'])->name('poli-mtbs.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananMtbsController::class, 'store'])->name('poli-mtbs.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'show'])->name('poli-mtbs.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananMtbsController::class, 'edit'])->name('poli-mtbs.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'update'])->name('poli-mtbs.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananMtbsController::class, 'destroy'])->name('poli-mtbs.destroy');
        });
    });

    Route::middleware(['user-access:konseling'])->group(function () {
        Route::prefix('poli-konseling')->group(function () {
            Route::get('/', [UnitPelayananKonselingController::class, 'index'])->name('poli-konseling.index');
            Route::get('/create', [UnitPelayananKonselingController::class, 'create'])->name('poli-konseling.create');
            Route::put('/create/{kajian_pasien}', [UnitPelayananKonselingController::class, 'status'])->name('poli-konseling.status');
            Route::get('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKonselingController::class, 'periksa'])->name('poli-konseling.periksa');
            Route::post('/create/{kajian_pasien:pasiens_no_rm}/periksa', [UnitPelayananKonselingController::class, 'store'])->name('poli-konseling.store');
            Route::get('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'show'])->name('poli-konseling.show');
            Route::get('/{pelayanan_pasien}/edit', [UnitPelayananKonselingController::class, 'edit'])->name('poli-konseling.edit');
            Route::put('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'update'])->name('poli-konseling.update');
            Route::delete('/{pelayanan_pasien}', [UnitPelayananKonselingController::class, 'destroy'])->name('poli-konseling.destroy');
        });
    });

    Route::middleware(['user-access:farmasi'])->group(function () {
        Route::prefix('obat')->group(function () {
            Route::get('/', [ObatController::class, 'index'])->name('obat.index');
            Route::get('/create', [ObatController::class, 'create'])->name('obat.create');
            Route::post('/create', [ObatController::class, 'store'])->name('obat.store');
            Route::get('/{obat}', [ObatController::class, 'show'])->name('obat.show');
            Route::get('/{obat}/edit', [ObatController::class, 'edit'])->name('obat.edit');
            Route::put('/{obat}', [ObatController::class, 'update'])->name('obat.update');
            Route::delete('/{obat}', [ObatController::class, 'destroy'])->name('obat.destroy');
        });
    });
});
