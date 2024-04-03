<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CourseRegister;
use App\Models\Session;
use App\Models\Department;
use App\Models\Level;
use App\Models\Semester;
use App\Models\Course;


class StudentController extends Controller
{
    public function showCourseRegistrationForm(Request $request){
    
        $sess = Session::pluck('session');
        $departments = Department::pluck('department');
        $levels = Level::pluck('level');
        $sems = Semester::pluck('semester');
        $courses = Course::pluck('course_name');

        $request->session()->put([
            'studName'=>'Ooi Chi Zhe',
            'regNo'=>'10806121',
            'pincode'=>'822894'
        ]);

        return view('student.courseRegistration', ['sess'=>$sess, 
        'departments'=>$departments, 'levels'=>$levels, 'sems'=>$sems, 'courses'=>$courses]);
    }

    public function createCourseRegistration(Request $request){

        $sess = Session::pluck('session');
        $departments = Department::pluck('department');
        $levels = Level::pluck('level');
        $sems = Semester::pluck('semester');
        $courses = Course::pluck('course_name');

        $request->validate([
            'regNo' => 'required',
            'pincode' => 'required',
            'session' => 'required',
            'department' => 'required',
            'level' => 'required',
            'semester' => 'required',
            'course' => 'required',
            // 'test' => 'required | min:3',
        ]);
        CourseRegister::create($request->all());

        $request->session()->flash('status', 'Register course successfully');

        return view('student.courseRegistration', ['sess'=>$sess, 
        'departments'=>$departments, 'levels'=>$levels, 'sems'=>$sems, 'courses'=>$courses]);
    }

    public function showRegistrationHistory(Request $request){
        $request->session()->put([
            'studName'=>'Ooi Chi Zhe',
            'regNo'=>'10806121',
            'pincode'=>'822894'
        ]);
        $reg_list = CourseRegister::all();
        

        return view('student.registrationHistory',['reg_list'=>$reg_list]);
    }

}
