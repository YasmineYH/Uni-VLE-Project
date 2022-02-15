<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Submission extends Model
{
    use HasFactory;

    protected $fillable = [
        'Assignment_ID',
        'Student_ID',
        'Grade',
        'Date_Submitted',
    ];
}
