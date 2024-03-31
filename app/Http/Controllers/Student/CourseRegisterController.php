<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CourseRegister;

class CourseRegisterController extends Controller
{
    public function store(Request $request){
        

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

        return CourseRegister::create($request->all());
    }
}
