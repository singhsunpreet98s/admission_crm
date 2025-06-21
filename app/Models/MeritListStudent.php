<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeritListStudent extends Model
{
    use HasFactory;
    protected $table = 'merit_list_students';
    protected $fillable = [
        'email',
        'name',
        'res_no',
        'file_id '
    ];
}
