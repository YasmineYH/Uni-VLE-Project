<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'Student_ID',
        'Student_Firstname',
        'Student_Middlename',
        'Student_Lastname',
        'Level',
        'Phone',
        'Email',
        'Profile',
        'Password'
    ];
}