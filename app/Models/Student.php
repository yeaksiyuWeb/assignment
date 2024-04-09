<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use App\Models\Session;
use App\Models\Department;
use App\Models\Semester;


class Student extends Model
{
    use HasFactory;

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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

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
