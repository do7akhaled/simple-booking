<?php

use App\Http\Controllers\BookRoomController;
use App\Http\Controllers\ShowAvailableRoomsController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('get-available-rooms', ShowAvailableRoomsController::class);

Route::post('book-room', BookRoomController::class);
