<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ReservationController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::middleware(['auth:api', 'role:user|librarian', 'verified'])->group(function () {
        Route::post('logout', [AuthController::class, 'logout']);
    });

    Route::middleware(['auth:api', 'role:user', 'verified'])->group(function () {
        Route::get('books/paginate/{length}', [BookController::class, 'paginate']);
        Route::get('books/search/{query}', [BookController::class, 'searchBook']);
        Route::get('books/reserved', [BookController::class, 'reservedBooks']);

        Route::post('reservations', [ReservationController::class, 'store']);
        Route::patch('reservations/{reservation}', [ReservationController::class, 'cancel']);
    });
});
