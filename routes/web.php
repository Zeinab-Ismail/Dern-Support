<?php

use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Models\Ticket;
use App\RoleEnum;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('employees', EmployeesController::class)->middleware(['role:' . RoleEnum::ADMIN->value]);
    Route::resource('tickets', TicketController::class);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/payment/{id}', [TicketController::class, 'pay'])->name('payment');
    Route::get('/payprocess/{id}', [TicketController::class, 'payprocess'])->name('payment.process');
});

require __DIR__ . '/auth.php';
