<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\DailyTravelController;



Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [DailyTravelController::class, 'index'])->name('dashboard')->middleware(['auth', 'verified']);

Route::get('/export/csv', [ExportController::class, 'exportCsv'])->name('export.csv')->middleware(['auth', 'verified']);
Route::get('/export/data', [ExportController::class, 'getCo2Data'])->name('export.data')->middleware(['auth', 'verified']);

Route::post('/', [DailyTravelController::class, 'store'])->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
