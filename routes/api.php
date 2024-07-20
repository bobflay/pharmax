<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DrugController;
use App\Http\Controllers\API\AuthController;

Route::post('/register',[AuthController::class,'register']);
Route::post('/login',[AuthController::class,'login']);

Route::get('/companies',[CompanyController::class,'index']);

Route::middleware('auth:sanctum')->post('/companies',[CompanyController::class,'store']);


Route::get('/drugs',[DrugController::class,'index']);
Route::post('/drugs',[DrugController::class,'store']);
