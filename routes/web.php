<?php

use App\Http\Controllers\LocationsController;
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

Route::get('/', function() {
    return redirect()->route('home');
});

Route::get('/locations', [LocationsController::class, 'index'])->name('home');
Route::post('/locations/store', [LocationsController::class, 'store'])->name('store-location');