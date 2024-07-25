<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post('/login',[ApiController::class,'auth'])->name('auth');
Route::get('/user',[ApiController::class,'getall'])->name('auth');
Route::get('/user/{id}',[ApiController::class,'getuser'])->name('auth');
Route::delete('/user/{id}',[ApiController::class,'delete'])->name('auth');



