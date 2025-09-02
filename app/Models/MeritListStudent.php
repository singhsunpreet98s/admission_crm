<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MeritListStudent extends Model
{
    use HasFactory;
    protected $table = 'merit_list_students';

    public function file()
    {
        return $this->belongsTo(MeritListFile::class, 'file_id', 'id');
    }
}
