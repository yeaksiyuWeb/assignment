<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Admin
Route::get('/course', [CourseController::class, 'showCoursePage']);
Route::get('/department',[DepartmentController::class,'showDepartmentPage']);
Route::get('/semester', [SemesterController::class, 'showSemesterPage']);

//Login for Admin and Student
Route::get('/login/admin',[LoginController::class,'showAdminLoginForm']);
Route::get('/login/student',[LoginController::class,'showStudentLoginForm']);
Route::post('/login/admin',[LoginController::class,'adminLogin']);
Route::post('/login/student',[LoginController::class,'studentLogin']);




//Student
// Route::view('course-registration','student.courseRegistration');
Route::get('course-registration',[StudentController::class, 'showCourseRegistrationForm']);
Route::post('course-registration',[StudentController::class,'createCourseRegistration']);



// Route::view('testerror','testerror');

