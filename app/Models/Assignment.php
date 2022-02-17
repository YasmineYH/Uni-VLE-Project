<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'CourseID',
        'AssignmentType',
        'DateAdded',
        'SubmissionDeadline',
        'ExtendedDeadline',
        'TotalMark',
        'Removed',
        'Expired',
        'Draft'
    ];
}
