<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCoursePage() {
        return view('admin/coursePage');
    }
}
