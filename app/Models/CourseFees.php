<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseFees extends Model
{
    use HasFactory;
    protected $table = 'course_fees';
    protected $fillable = [
        'course_id',
        'category_id',
        'gender',
        'fee_head',
        'amount',
        'period_number',
        'added_by'
    ];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
