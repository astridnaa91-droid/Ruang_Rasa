<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\ReservationController;
use App\Http\Controllers\Admin\AdminReservationController;

Route::get('/dashboard', function () {
    if (auth()->user()->isAdmin()) {
        return redirect()->route('admin.reservations.index');
    }
    return redirect()->route('tables.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Customer Reservation Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/tables', [ReservationController::class, 'index'])->name('tables.index');
    Route::get('/reservations/create/{table}', [ReservationController::class, 'create'])->name('reservations.create');
    Route::post('/reservations', [ReservationController::class, 'store'])->name('reservations.store');
    Route::get('/reservations', [ReservationController::class, 'history'])->name('reservations.history');
});

// Admin Reservation Routes
Route::middleware(['auth', 'verified', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/reservations', [AdminReservationController::class, 'index'])->name('reservations.index');
    Route::post('/reservations/{reservation}/confirm', [AdminReservationController::class, 'confirm'])->name('reservations.confirm');
    Route::post('/reservations/{reservation}/reject', [AdminReservationController::class, 'reject'])->name('reservations.reject');
});

require __DIR__.'/auth.php';
