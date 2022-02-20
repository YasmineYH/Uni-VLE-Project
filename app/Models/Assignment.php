<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;
    protected $table = 'assignments';

    protected $fillable = [
        'courseid',
        'assignmenttype',
        'dateadded',
        'submissiondeadline',
        'extendeddeadline',
        'totalmark',
        'removed',
        'expired',
        'draft'
    ];
}
