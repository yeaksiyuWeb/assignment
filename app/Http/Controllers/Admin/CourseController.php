<?php

namespace App\Http\Controllers\Admin;

use App\Models\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCoursePage() {
        return view('admin/coursePage');
    }

    public function getAll(){
        return Course::all();
    }

    public function addCourse(Request $request) {
        $request->validate([
            'course_code' => 'required | unique:courses',
            'course_name' => 'required | max:255 | unique:courses',
            'course_unit' => 'required | integer',
            'no_of_seats' => 'required | integer | min: 20'
        ]);
        $data = $request->input();
        Course::create($data);
        return redirect("course");

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
