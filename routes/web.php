<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SignController;
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

Route::get('/', [SignController::class, 'indexLog'])->name('login');
Route::post('/login', [SignController::class, 'authenticate']);
Route::get('/register', [SignController::class, 'indexReg'])->middleware('guest');
Route::post('/register', [SignController::class, 'storeReg']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::get('/logout', [SignController::class, 'logout']);
    Route::post('/create', [DashboardController::class, 'createList']);
    Route::get('/detail/{id}', [DashboardController::class, 'detailList']);
    Route::get('/delete/{id}', [DashboardController::class, 'deleteList']);
});
