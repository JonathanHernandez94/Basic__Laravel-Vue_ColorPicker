<?php

use App\Http\Controllers\GradientController;
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

Route::view('/', 'home');
Route::get('/gradients/{id}', [GradientController::class, 'show'])->name('gradient.show');
Route::post('/gradients', [GradientController::class, 'store'])->name('gradient.store');
