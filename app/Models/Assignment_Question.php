<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment_Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'Question_ID',
        'Assignment_ID',
        'Question_Title',
        'Option_Correct',
        'Option_2',
        'Option_3',
        'Option_4',
        'Option_5',
        'Answer_File'
    ];
}
