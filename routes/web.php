<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\MidtransPaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Api\VerifyPaymentController;
use App\Http\Controllers\Api\SendQrisController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\VerifyCsrfToken;

// Landing Page Route
Route::get('/', function () {
    return view('welcome');
});

Route::get('/lineup', function () {
    return view('page.lineup');
})->name('lineup');

Route::get('/package', function () {
    return view('package');
})->name('package');

Route::get('/aboutus', function () {
    return view('page.aboutus');
})->name('aboutus');

Route::get('/faq', function () {
    return view('faq');
})->name('faq');



// Admin Page Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Route::withoutMiddleware([\App\Http\Middleware\VerifyCsrfToken::class])->group(function () {
//     Route::post('/process-payment', [MidtransPaymentController::class, '__invoke']);
// });

// Payment Route
Route::post('/process-payment', [MidtransPaymentController::class, '__invoke'])->name('process-payment');
Route::post('/verify-payment', [VerifyPaymentController::class, '__invoke']);


Route::get('/createorder', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');

Route::post('/send-qris', [SendQrisController::class, '__invoke'])->name('send-qris');
require __DIR__ . '/auth.php';
