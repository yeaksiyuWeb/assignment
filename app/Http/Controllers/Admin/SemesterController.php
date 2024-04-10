<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Semester;
use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function showSemesterPage() {
        return view('admin/semesterPage');
    }

    public function getAll() {
        return Semester::all();
    }

    public function addSemester(Request $request) {
        $request->validate([
            'semester' => 'required | integer | max: 10',
        ]);
        $data = $request->input();
        Semester::create($data);
        return redirect("semester");
    }

    public function deleteSemester($id) {
        $semester = Semester::findOrFail($id);
        $semester-> delete();
        return 204;
    }

}
