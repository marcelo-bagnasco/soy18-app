<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

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

Route::get('/fizzbuzz/{id}', [Controller::class, 'fizzBuzz'])->name('FizzBuzz');
Route::get('/top_k_elements/{k}/{elements}', [Controller::class, 'topKelements'])->name('TopKElements');
Route::get('/longest_sequence/{elements}', [Controller::class, 'longestSequence'])->name('LongestSequence');
Route::get('/basket_price', [Controller::class, 'basketPrice'])->name('BasketPrice')
    ->middleware('ageDiscount','itemQuantityDiscount', 'totalAmountDiscount');
