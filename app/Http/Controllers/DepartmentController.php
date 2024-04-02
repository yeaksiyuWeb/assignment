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

    public function getAll() {
        return Department::all();
    }

    public function delete($id) {
        // echo "delete";
        $dept = Department::findOrFail($id);
        $dept -> delete();
        return 204;
    }
}
