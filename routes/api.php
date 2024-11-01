<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MidtransPaymentController;

Route::post('/process-payment', [MidtransPaymentController::class, '__invoke']);
