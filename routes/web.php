<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasienController;

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->middleware('auth')->name('dashboard');
    // Middleware untuk mengelola Pasien (hanya untuk super_admin dan admin)
    Route::middleware('can:manage patients')->group(function () {
        Route::resource('patients', PasienController::class);
    });

    // Middleware untuk melihat Pasien (hanya untuk super_admin, admin, dan nurse)
    Route::middleware('can:view patients')->group(function () {
        Route::resource('patients', PasienController::class)->only(['index', 'show']);
    });
});

require __DIR__ . '/auth.php';
