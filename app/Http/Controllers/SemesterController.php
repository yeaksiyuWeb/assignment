<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SemesterController extends Controller
{
    public function showSemesterPage() {
        return view('admin/semesterPage');
    }
}
