<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ErrorLogs extends Model
{
    use HasFactory;
    protected $table = 'error_logs';
    protected $fillable = [
        'module',
        'message',
        'data',
    ];
    protected $casts = [
        'data' => 'object',
    ];
}
