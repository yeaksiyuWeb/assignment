<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
use App\Models\Department;
use App\Models\Semester;

use Illuminate\Foundation\Auth\User as Authenticatable;


class Student extends Authenticatable
{
    use HasFactory;

    // protected $guard = 'student';

    protected $fillable = [
        'regNo',
        'password',
        'studentName',
        'pincode',
        'cgpa'
    ];

    protected $hidden =[
        'password',
    ];


    public function getSession(){
        return $this->belongsTo(Session::class);
    }

    public function getDepartment(){
        return $this->belongsTo(Department::class);
    }

    public function getSemester(){
        return $this->belongsTo(Semester::class);
    }
}
