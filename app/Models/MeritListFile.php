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
}
