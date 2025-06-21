<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;
    protected $table = 'semesters';
    protected $fillable = [
        'course_id ',
        'name',
        'number',
        'added_by ',
    ];
}
