<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\CourseRegister;

class StudentController extends Controller
{
    public function showCourseRegistrationForm(Request $request){
        $sess = ['Feb 2024','May 2024', 'Oct 2024'];
        $departments = ['IT','HR'];
        $levels = ['1','2','3'];
        $sems = ['1','2','3'];
        $courses = ['SQA','SE','AWAD'];


        $request->session()->put([
            'studName'=>'Ooi Chi Zhe',
            'regNo'=>'10806121',
            'pincode'=>'822894']);
        return view('student.courseRegistration', ['sess'=>$sess, 
        'departments'=>$departments, 'levels'=>$levels, 'sems'=>$sems, 'courses'=>$courses]);
    }

    public function createCourseRegistration(Request $request){

        $sess = ['Feb 2024','May 2024', 'Oct 2024'];
        $departments = ['IT','HR'];
        $levels = ['1','2','3'];
        $sems = ['1','2','3'];
        $courses = ['SQA','SE','AWAD'];

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
}
