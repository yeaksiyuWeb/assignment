<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\CourseRegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DepartmentController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/post',[CourseRegisterController::class,'store']);

// ----------- Department ----------- //
Route::get('/departments',[DepartmentController::class,'getAll']);
Route::delete('/department/{id}',[DepartmentController::class,'delete']);
