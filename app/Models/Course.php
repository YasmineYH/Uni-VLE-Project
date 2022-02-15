<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'Course_ID',
        'Course_Code',
        'Course_Title',
        'Lecturer_ID'
    ];
}
