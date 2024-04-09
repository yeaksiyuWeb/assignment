<?php

namespace App\Http\Controllers;

use App\Models\CourseRegister;
use Illuminate\Http\Request;

class CourseRegistrationHistory extends Controller
{
    public function getAll () {
        return CourseRegister::all();
    }

    public function getJoinedTable() {
        $registration_history = CourseRegister::with('joinStudentTable')->get();

        return view('admin/courseRegistrationHistoryPage', compact('registration_history'));
    }
}
