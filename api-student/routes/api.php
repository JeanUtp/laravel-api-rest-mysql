<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/students',[StudentController::class,'showStudents']);
Route::get('/student/{id}',[StudentController::class,'getStudent']);
Route::post('/student',[StudentController::class,'createStudent']);
Route::put('/student/{id}',[StudentController::class,'updateStudent']);
Route::delete('/student/{id}',[StudentController::class,'deleteStudent']);
