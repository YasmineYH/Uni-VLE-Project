<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    use HasFactory;

    protected $fillable = [
        'Lecturer_ID',
        'Lecturer_Firstname',
        'Lecturer_Middlename',
        'Lecturer_Lastname',
        'Phone',
        'Email',
        'Status',
        'Profile',
        'Password'
    ];
}