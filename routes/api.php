<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\CompanyController;
use App\Http\Controllers\API\DrugController;

Route::get('/companies',[CompanyController::class,'index']);
Route::post('/companies',[CompanyController::class,'store']);



Route::get('/drugs',[DrugController::class,'index']);
Route::post('/drugs',[DrugController::class,'store']);
