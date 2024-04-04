<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }


}
