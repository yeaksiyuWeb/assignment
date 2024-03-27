<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'regNo',
        'studentPhoto',
        'password',
        'studentName',
        'pincode',
        'session',
        'department',
        'semester',
        'cgpa'
    ];

    protected $hidden =[
        'password',
    ];


}
