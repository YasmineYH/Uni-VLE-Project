<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;
    protected $table = 'lecturers';

    protected $fillable = [
        'lecturerid',
        'lecturerfirstname',
        'lecturermiddlename',
        'lecturerlastname',
        'phone',
        'email',
        'status',
        'profile',
        'password'
    ];
}