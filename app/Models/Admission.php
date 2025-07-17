<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admission extends Model
{
    use HasFactory;
    protected $table = 'admissions';
    protected $fillable = [
        'ureg_no',
        'list_type',
        'session_yr',
        'quota_type',
        'student_name',
        'father_name',
        'mother_name',
        'dob',
        'gender',
        'category',
        'relegion',
        'aadhar',
        'ews',
        'ews_certificate',
        'reservation',
        'reservation_certificate',
        'abc_id',
        'caddress',
        'cstate',
        'cdistrict',
        'cpin',
        'phone',
        'email',
        'course_name',
        'department',
        'ac_year',
        'sub_name',
        'sub2',
        'sub3',
        'll',
        'sec',
        'vac',
        'PassYear10',
        'Board10',
        'RollCode10',
        'RollNo10',
        'MaxMarks10',
        'MarksObt10',
        'MarksObt10Per',
        'PassYear12',
        'Board12',
        'xii_stream',
        'RollCode12',
        'RollNo12',
        'MaxMarks12',
        'MarksObt12',
        'MarksObt12Per',
        'marksheet12',
        'certificate12',
        'clc',
        'migration12',
        'baccount_name',
        'baccount_no',
        'baccount_noc',
        'baccount_ifsc',
        'baccount_bname',
        'declaration',
        'user_id',
        'created_by',
        'course_id',
        'semester_id'
    ];
}
