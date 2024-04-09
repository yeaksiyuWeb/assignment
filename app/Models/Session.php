<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Session extends Model
{
    use HasFactory;

    protected $fillable =[
        'session',
    ];

    public function getStudents(){
        return $this->hasMany(Student::class);
    }
}
