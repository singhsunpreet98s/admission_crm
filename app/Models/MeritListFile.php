<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeritListFile extends Model
{
    use HasFactory;
    protected $table = 'merit_list_files';
    protected $fillable = [
        'file_path',
        'file_name',
        'size',
        'uploaded_by',
        'course_id'
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
