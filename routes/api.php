<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\SubjectController;
use Illuminate\Support\Facades\Route;


Route::post('users', [UserController::class, 'store']);
Route::post('login', [AuthController::class, 'store']);
Route::post('recovery-password', [UserController::class, 'recoveryPassword']);

/*
* Subject Routes
*/
Route::get('subjects', [SubjectController::class, 'all']);

/*
* Question Routes
*/

Route::get('questions/{id}', [QuestionController::class, 'find']);
Route::get('questions/subject/{id}', [QuestionController::class, 'findAllBySubjectId']);
Route::post('questions/awnser', [QuestionController::class,'awnserQuestion']);
Route::middleware('auth:sanctum')->group(function () {

});
