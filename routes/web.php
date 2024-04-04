<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterStudController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Login for Admin and Student
Route::get('/login/admin',[LoginController::class,'showAdminLoginForm']);
Route::get('/login/student',[LoginController::class,'showStudentLoginForm']);
Route::post('/login/admin',[LoginController::class,'adminLogin']);
Route::post('/login/student',[LoginController::class,'studentLogin']);


//Admin
Route::get('/course', [CourseController::class, 'showCoursePage']);
Route::post('/course', [CourseController::class, 'addCourse']);
Route::get('/department',[DepartmentController::class,'showDepartmentPage']);
Route::post('/addDept', [DepartmentController::class, 'save']);
Route::get('/semester', [SemesterController::class, 'showSemesterPage']);
Route::post('/semester', [SemesterController::class, 'addSemester']);
Route::get('/session', [SessionController::class, 'showSessionPage']);
Route::post('/addSession', [SessionController::class, 'save']);
Route::get('/student-registration', [RegisterStudController::class, 'showRegisterStudentPage']);
Route::post('/addStudent', [RegisterStudController::class, 'addStudent']);

//Student
Route::get('/student/course-registration',[StudentController::class, 'showCourseRegistrationForm']);
Route::post('/student/course-registration',[StudentController::class,'createCourseRegistration']);
Route::get('/student/registration-history',[StudentController::class,'showRegistrationHistory']);

//post
Route::get('/posts/index',[PostController::class,'display']);
