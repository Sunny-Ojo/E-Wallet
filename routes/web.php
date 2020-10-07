<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\PaymentController;
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
    return view('welcome');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});
Route::get('/fund-account', [PaymentController::class, 'showFundView'])->name('fundAccount');
Route::post('initializing-funding', [PaymentController::class, 'initializeFunding'])->name('initializeFunding');
Route::get('verify-funding', [PaymentController::class, 'verifyFunding'])->name('verifyFunding');
Route::get('transfer-money', [PagesController::class, 'transfer'])->name('sendMoney');
Route::post('transfer-money', [PagesController::class, 'makeTransfer'])->name('transferFunds');

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
