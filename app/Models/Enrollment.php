<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;
    protected $table = 'enrollments';

    protected $fillable = [
        'StudentID',
        'CourseID'
    ];
}
