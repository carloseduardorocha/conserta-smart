<?php

use App\Http\Controllers\StockController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderServiceController;

use Illuminate\Support\Facades\Route;

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

Route::get('/dashboard-old', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboardOld');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('clients', ClientController::class);
    Route::resource('stock', StockController::class);
    Route::resource('orders', OrderServiceController::class);

    Route::prefix('reports')->name('reports.')->group(function () {
        Route::get('/services', [ReportController::class, 'services'])->name('services');
        Route::get('/stock', [ReportController::class, 'stock'])->name('stock');
    });
});

require __DIR__.'/auth.php';
