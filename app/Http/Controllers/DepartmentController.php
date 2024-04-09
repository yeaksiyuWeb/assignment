<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    //
    public function index() {

    }

    public function showDepartmentPage() {
        return view('admin/department');
    }

    public function getStudents($id){
        return Department::find($id)->getStudents()->get();
    }

    public function getAll() {
        return Department::all();
    }

    public function delete($id) {
        // echo "delete";
        $dept = Department::findOrFail($id);
        $dept -> delete();
        return 204;
    }

    public function save(Request $request){
        $request -> validate([
            'department' => 'required'
        ]);
        $department = new Department;
        $currentDateTime = date("Y-m-d h:i:s"); 
        $department->created_at = $currentDateTime;
        $department->fill($request->all());
        $department->save();
        return redirect("/department");
    }
}
