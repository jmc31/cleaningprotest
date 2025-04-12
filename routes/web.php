<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Livewire\{BookingCreate, BookingEdit, BookingView, BookingPayment};


Route::get('/', function () {
    return view('welcome');
});


Route::get('/booking/create', BookingCreate::class)->name('booking.create');
Route::get('/booking/edit/{id}', BookingEdit::class)->name('booking.edit');
Route::get('/booking/view', BookingView::class)->name('booking.view');
Route::get('/booking/payment/{id}', BookingPayment::class)->name('booking.payment');



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
