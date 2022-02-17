<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course_Material extends Model
{
    use HasFactory;
    protected $table = 'course__materials';

    protected $fillable = [
        'CourseID',
        'MaterialFile'
    ];
}
