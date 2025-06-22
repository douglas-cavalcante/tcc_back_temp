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

Route::post('subjects', [SubjectController::class, 'store']);
Route::get('subjects', [SubjectController::class, 'all']);
/*
* Question Routes
*/
Route::get('questions', [QuestionController::class, 'all']);
Route::get('questions/{id}', [QuestionController::class, 'find']);
Route::get('questions/subject/{id}', [QuestionController::class, 'findAllBySubjectId']);
Route::post('questions', [QuestionController::class, 'store']);
Route::post('questions/answer', [QuestionController::class, 'answerQuestion']);
Route::put('questions/edit/{id}', [QuestionController::class,'update']);

Route::middleware('auth:sanctum')->group(function () {

});
