<?php

use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::post("/{student_id}/{session_id}" , [HomeController::class ,'store']) ;
Route::get("/" ,[HomeController::class ,'index']) ;
