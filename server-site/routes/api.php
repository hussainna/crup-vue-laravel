<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\StudentsController;

Route::get('get-students',[StudentsController::class,'index']);
Route::post('insert-student',[StudentsController::class,'insert']);
Route::get('edit-student/{id}',[StudentsController::class,'edit']);
Route::post('update-student/{id}',[StudentsController::class,'update']);
Route::post('delete-students/{id}',[StudentsController::class,'delete']);



Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
