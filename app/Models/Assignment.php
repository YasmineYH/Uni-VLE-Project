<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    protected $fillable = [
        'Course_ID',
        'Assignment_Type',
        'Date_Added',
        'Submission_Deadline',
        'Extended_Deadline',
        'Total_Mark',
        'Removed',
        'Expired',
        'Draft'
    ];
}
