<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Question extends Model
{
    use HasFactory;
    protected $table = 'assignment__questions';

    protected $fillable = [
        'QuestionID',
        'AssignmentID',
        'QuestionTitle',
        'OptionCorrect',
        'Option2',
        'Option3',
        'Option4',
        'Option5',
        'AnswerFile'
    ];
}
