<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class ManageStudentController extends Controller
{
    public function index(){

    }

    public function showManageStudent(){
        return view('admin/manageStudent');
    }

    public function getAll(){
        return Student::all();
    }

    public function delete($id){
        $student = Student::findOrFail($id);
        $student -> delete();
        return 204;
    }

    public function update(Request $request, $id){
        $student = Student::findOrFail($id);
        $student -> update($request->all());
        return $student;
    }
}
