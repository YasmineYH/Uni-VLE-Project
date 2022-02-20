<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Submission extends Model
{
    use HasFactory;
    protected $table = 'assignment__submissions';

    protected $fillable = [
        'assignmentid',
        'studentid',
        'grade',
        'datesubmitted',
    ];
}
