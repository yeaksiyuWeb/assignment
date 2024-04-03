<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCoursePage() {
        return view('admin/coursePage');
    }

    public function getAll(){
        return Course::all();
    }

    public function updateCourse(Request $request, $id)
    {
        $course = Course::findOrFail($id);
        $course -> update($request->all());
        return $course;
    }

    public function deleteCourse($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return 204;
    }

}
