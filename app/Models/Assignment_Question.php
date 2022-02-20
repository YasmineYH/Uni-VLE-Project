<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Question extends Model
{
    use HasFactory;
    protected $table = 'assignment__questions';

    protected $fillable = [
        'questionid',
        'assignmentid',
        'questiontitle',
        'optioncorrect',
        'option2',
        'option3',
        'option4',
        'option5',
        'answerfile'
    ];
}
