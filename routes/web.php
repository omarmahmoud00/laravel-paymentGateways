<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Gateways\MollieController;
use App\Http\Controllers\Gateways\PaypalController;
use App\Http\Controllers\Gateways\StripeController;
use App\Http\Controllers\Gateways\PaystackController;
use App\Http\Controllers\Gateways\SslCommerzPaymentController;
use App\Http\Controllers\Gateways\InstamojoController;


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

Route::post('payment/menue', function (Request $request){

    return view('payment-gateways',compact('request')); 
})->name('payment.menue');


// Route::post('/paypal',[PaypalController::class,'payment'])->name('paypal.payment');
// Route::get('paypal/success',[PaypalController::class,'success'])->name('paypal.success');
// Route::get('paypal/cancel',[PaypalController::class,'cancel'])->name('paypal.cancel');



// Route::post('/stripe',[StripeController::class,'payment'])->name('stripe.payment');
// Route::get('stripe/success',[StripeController::class,'success'])->name('stripe.success');
// Route::get('stripe/cancel',[StripeController::class,'cancel'])->name('stripe.cancel');



// Route::post('/instamojo',[InstamojoController::class,'payment'])->name('instamojo.payment');
// Route::get('instamojo/callback',[InstamojoController::class,'success'])->name('instamojo.callback');
// Route::get('instamojo/cancel',[InstamojoController::class,'cancel'])->name('instamojo.cancel');






// Route::post('/mollie',[MollieController::class,'payment'])->name('mollie.payment');
// Route::get('mollie/success',[MollieController::class,'success'])->name('mollie.success');
// Route::get('mollie/cancel',[MollieController::class,'cancel'])->name('mollie.cancel');



// Route::post('/paystack',[PaystackController::class,'payment'])->name('paystack.payment');
// Route::post('paystack/callback',[PaystackController::class,'verifyTreansaction'])->name('paystack.callback');
// //



// Route::post('/sslcommerz',[SslCommerzPaymentController::class, 'index'])->name('sslcommerz.payment');
// Route::post('sslcommerz/success', [SslCommerzPaymentController::class, 'success']);
// Route::post('sslcommerz/fail', [SslCommerzPaymentController::class, 'fail']);
// Route::post('sslcommerz/cancel', [SslCommerzPaymentController::class, 'cancel']);
 

// PayPal routes
Route::group(['prefix' => 'paypal'], function () {
    Route::post('/payment', [PaypalController::class, 'payment'])->name('paypal.payment');
    Route::get('/success', [PaypalController::class, 'success'])->name('paypal.success');
    Route::get('/cancel', [PaypalController::class, 'cancel'])->name('paypal.cancel');
});

// Stripe routes
Route::group(['prefix' => 'stripe'], function () {
    Route::post('/payment', [StripeController::class, 'payment'])->name('stripe.payment');
    Route::get('/success', [StripeController::class, 'success'])->name('stripe.success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('stripe.cancel');
});

// Instamojo routes
Route::group(['prefix' => 'instamojo'], function () {
    Route::post('/payment', [InstamojoController::class, 'payment'])->name('instamojo.payment');
    Route::get('/callback', [InstamojoController::class, 'success'])->name('instamojo.callback');
    Route::get('/cancel', [InstamojoController::class, 'cancel'])->name('instamojo.cancel');
});

// Mollie routes
Route::group(['prefix' => 'mollie'], function () {
    Route::post('/payment', [MollieController::class, 'payment'])->name('mollie.payment');
    Route::get('/success', [MollieController::class, 'success'])->name('mollie.success');
    Route::get('/cancel', [MollieController::class, 'cancel'])->name('mollie.cancel');
});

// Paystack routes
Route::group(['prefix' => 'paystack'], function () {
    Route::post('/payment', [PaystackController::class, 'payment'])->name('paystack.payment');
    Route::post('/callback', [PaystackController::class, 'verifyTreansaction'])->name('paystack.callback');
});

// SslCommerz routes
Route::group(['prefix' => 'sslcommerz'], function () {
    Route::post('/payment', [SslCommerzPaymentController::class, 'index'])->name('sslcommerz.payment');
    Route::post('/success', [SslCommerzPaymentController::class, 'success']);
    Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
    Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);
});