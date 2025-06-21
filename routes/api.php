<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::post('users', [UserController::class, 'store']);
Route::post('login', [AuthController::class, 'store']);
Route::post('recovery-password', [UserController::class, 'recoveryPassword']);

/*
* Subject Routes
*/
Route::get('subjects', [SubjectController::class, 'all']);

Route::middleware('auth:sanctum')->group(function () {

});
