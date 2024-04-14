<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\CourseRegistrationHistory;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SemesterController;
use App\Http\Controllers\Admin\SessionController;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\RegisterStudController;
use App\Http\Controllers\Admin\ManageStudentController;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function () {
  return redirect()->route('login.student');
});

//Login for Admin and Student
Route::get('/login/admin',[LoginController::class,'showAdminLoginForm'])->name('login.admin');
Route::get('/login/student',[LoginController::class,'showStudentLoginForm'])->name('login.student');
Route::post('/login/admin',[LoginController::class,'adminLogin']);
Route::post('/login/student',[LoginController::class,'studentLogin']);

Route::get('logout',[LoginController::class,'logout']);


Route::group(['middleware' => 'auth:admin'], function () { 
  Route::get('/admin/course', [CourseController::class, 'showCoursePage']);
  Route::post('/course', [CourseController::class, 'addCourse']);
  Route::get('/admin/department',[DepartmentController::class,'showDepartmentPage']);
  Route::post('/addDept', [DepartmentController::class, 'save']);
  Route::get('/admin/semester', [SemesterController::class, 'showSemesterPage']);
  Route::post('/semester', [SemesterController::class, 'addSemester']);
  Route::get('/admin/session', [SessionController::class, 'showSessionPage']);
  Route::post('/addSession', [SessionController::class, 'save']);
  Route::get('/admin/student-registration', [RegisterStudController::class, 'showRegisterStudentPage']);
  Route::post('/addStudent', [RegisterStudController::class, 'addStudent']);
  Route::get('/admin/manageStudent', [ManageStudentController::class, 'showManageStudent']);
  Route::get('/admin/registration-history', [CourseRegistrationHistory::class, 'getAll']);
  Route::get('/admin/posts',[PostController::class,'index'])->name('posts.admin.display');
  Route::post('/admin/posts',[PostController::class,'create'])->name('posts.admin.store');
  Route::put('/admin/posts/{id}',[PostController::class,'update'])->name('posts.admin.update');
  Route::delete('/admin/posts/{id}', [PostController::class, 'destroy'])->name('posts.admin.destroy');
});

Route::group(['middleware' => 'auth:student'], function () {
  Route::get('/student/course-registration',[StudentController::class, 'showCourseRegistrationForm']);
  Route::post('/student/course-registration',[StudentController::class,'createCourseRegistration']);
  Route::get('/student/registration-history',[StudentController::class,'showRegistrationHistory']);
  Route::get('/student/posts',[PostController::class,'index'])->name('posts.student.display');
  Route::post('/student/posts',[PostController::class,'create'])->name('posts.student.store');
  Route::put('/student/posts/{id}',[PostController::class,'update'])->name('posts.student.update');
  Route::delete('/student/posts/{id}', [PostController::class, 'destroy'])->name('posts.student.destroy');

});


//Admin
// Route::get('/admin/course', [CourseController::class, 'showCoursePage']);
// Route::post('/course', [CourseController::class, 'addCourse']);
// Route::get('/admin/department',[DepartmentController::class,'showDepartmentPage']);
// Route::post('/addDept', [DepartmentController::class, 'save']);
// Route::get('/admin/semester', [SemesterController::class, 'showSemesterPage']);
// Route::post('/semester', [SemesterController::class, 'addSemester']);
// Route::get('/admin/session', [SessionController::class, 'showSessionPage']);
// Route::post('/addSession', [SessionController::class, 'save']);
// Route::get('/admin/student-registration', [RegisterStudController::class, 'showRegisterStudentPage']);
// Route::post('/addStudent', [RegisterStudController::class, 'addStudent']);
// Route::get('/admin/manageStudent', [ManageStudentController::class, 'showManageStudent']);
// Route::get('/admin/registration-history', [CourseRegistrationHistory::class, 'getAll']);


//Student
// Route::get('/student/course-registration',[StudentController::class, 'showCourseRegistrationForm']);
// Route::post('/student/course-registration',[StudentController::class,'createCourseRegistration']);
// Route::get('/student/registration-history',[StudentController::class,'showRegistrationHistory']);

//post
// Route::get('/posts',[PostController::class,'index'])->name('posts.display');
// Route::post('/posts',[PostController::class,'create'])->name('posts.store');
// Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update');
// Route::delete('/posts/{id}', [PostController::class, 'destroy'])->name('posts.destroy');
