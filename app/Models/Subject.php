<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subject extends Model
{
    use HasFactory;
    protected $table = 'subjects';
    protected $fillable = [
        'semester_id',
        'name',
        'is_minor',
        'is_extra',
        'added_by',
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function semester()
    {
        return $this->belongsTo(Semester::class, 'semester_id');
    }
}
