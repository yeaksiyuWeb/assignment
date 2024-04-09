<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\CourseRegisterController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ManageStudentController;

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
// })

// ----------- Course --------------- //
Route::get('/courses',[CourseController::class, 'getAll']);
Route::put('/course/{id}',[CourseController::class, 'updateCourse']);
Route::delete('/course/{id}',[CourseController::class, 'deleteCourse']);

// ----------- Department ----------- //
Route::get('/departments',[DepartmentController::class,'getAll']);
Route::delete('/department/{id}',[DepartmentController::class,'delete']);
Route::get('/departmentStud/{id}', [DepartmentController::class, 'getStudents']);

// ----------- Semester ----------- //
Route::get('/semesters', [SemesterController::class, 'getAll']);
Route::delete('/semester/{id}', [SemesterController::class, 'deleteSemester']);

// ----------- Session ----------- //
Route::get('/sessions',[SessionController::class,'getAll']);
Route::delete('/session/{id}',[SessionController::class,'delete']);

// ----------- Manage Student ----------- //
Route::get('/students', [ManageStudentController::class, 'getAll']);
Route::put('/student/{id}',[ManageStudentController::class, 'update']);
Route::delete('/student/{id}',[ManageStudentController::class,'delete']);