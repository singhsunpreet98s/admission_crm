<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->string('ureg_no')->nullable();
            $table->string('list_type')->nullable();
            $table->string('session_yr')->nullable();
            $table->string('quota_type')->nullable();
            $table->string('student_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('category')->nullable();
            $table->string('relegion')->nullable();
            $table->string('aadhar')->nullable();
            $table->string('ews')->nullable();
            $table->string('ews_certificate')->nullable();
            $table->string('reservation')->nullable();
            $table->string('reservation_certificate')->nullable();
            $table->string('abc_id')->nullable();
            $table->text('caddress')->nullable();
            $table->string('cstate')->nullable();
            $table->string('cdistrict')->nullable();
            $table->string('cpin')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('course_name')->nullable();
            $table->string('department')->nullable();
            $table->string('ac_year')->nullable();
            $table->string('sub_name')->nullable();
            $table->string('sub2')->nullable();
            $table->string('sub3')->nullable();
            $table->string('ll')->nullable();
            $table->string('sec')->nullable();
            $table->string('vac')->nullable();

            // 10th
            $table->string('PassYear10')->nullable();
            $table->string('Board10')->nullable();
            $table->string('RollCode10')->nullable();
            $table->string('RollNo10')->nullable();
            $table->string('MaxMarks10')->nullable();
            $table->string('MarksObt10')->nullable();
            $table->string('MarksObt10Per')->nullable();

            // 12th
            $table->string('PassYear12')->nullable();
            $table->string('Board12')->nullable();
            $table->string('xii_stream')->nullable();
            $table->string('RollCode12')->nullable();
            $table->string('RollNo12')->nullable();
            $table->string('MaxMarks12')->nullable();
            $table->string('MarksObt12')->nullable();
            $table->string('MarksObt12Per')->nullable();
            $table->string('marksheet12')->nullable();
            $table->string('certificate12')->nullable();
            $table->string('clc')->nullable();
            $table->string('migration12')->nullable();

            // Bank details
            $table->string('baccount_name')->nullable();
            $table->string('baccount_no')->nullable();
            $table->string('baccount_noc')->nullable();
            $table->string('baccount_ifsc')->nullable();
            $table->string('baccount_bname')->nullable();

            $table->string('declaration')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropColumn([
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
                'declaration'
            ]);
        });
    }
};
