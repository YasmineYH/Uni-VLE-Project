<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question_Answers extends Model
{
    use HasFactory;
    protected $table = 'question__answers';

    protected $fillable = [
        'submissionid',
        'questionid',
        'answer'
    ];
}
