<?php

use App\Livewire\Payroll;
use Illuminate\Support\Facades\Route;
use App\Livewire\Presensi;

Route::get('/', function () {
    return redirect('/dashboard');
});

Route::get('login', function () {
    return redirect('/dashboard/login');
})->name('login');

Route::get('/presensi', Presensi::class)->middleware(['auth', 'isLeave'])->name('presensi');
Route::get('/payroll', Payroll::class)->middleware(['auth', 'isAdmin']);