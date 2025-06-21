<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = [
        'user_id',
        'course_id',
        'semester_id',
        'amount',
        'method',
        'razorpay_payment_id',
        'status',
        'paid_at'
    ];
}
