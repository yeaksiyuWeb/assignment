<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RegisterStudController extends Controller
{
    public function showRegisterStudentPage() {
        return view('admin/manageStudentPage');
    }

    public function addStudent(Request $request) {
        $request->validate([
            'studentName' => 'required | max:255',
            'regNo' => 'required | integer | digits:7',
            'password' => 'required | regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/',
        ],
        [
            'password.regex' => 'The password must contain at least one lowercase letter, one uppercase letter, one digit, one special character, and be between 8 to 12 characters in length.'
        ]);
        $data = $request->input();
        Student::create($data);

        Session::flash('success_student_name', $data['studentName']);

        return redirect("student-registration");
    }
}
