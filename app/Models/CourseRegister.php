<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseRegister extends Model
{
    use HasFactory;

    protected $fillable =[
        'regNo',
        'pincode',
        'session',
        'department',
        'level',
        'semester',
        'course',
    ];

    const CREATED_AT = 'registerDate';

    public function getUpdatedAtColumn()
    {
        return null;
    }

    public function joinStudentTable()
    {
        return $this->belongsTo(Student::class, 'regNo');
    }
}
