<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PaymentsController;
use App\Http\Livewire\Checkout;
use App\Http\Livewire\Invoice;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home');
});

Route::middleware('auth')->group(function(){
    Route::get('checkout', Checkout::class)->name('checkout');

    Route::get('invoice/{payment_id}/{status}', [PaymentsController::class, 'show'])->name('invoice');

    Route::get('payment/callback', [PaymentsController::class, 'callback'])->name('payment.callback');

    Route::post('payment/pay', [PaymentsController::class, 'pay'])->name('payment.pay');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('guest')->group(function(){
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});
