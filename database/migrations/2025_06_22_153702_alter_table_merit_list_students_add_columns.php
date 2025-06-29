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
        Schema::table('merit_list_students', function (Blueprint $table) {
            $table->string('application_id')->nullable();
            $table->string('student_name')->nullable();
            $table->string('fathers_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('category')->nullable();
            $table->string('domincile')->nullable();
            $table->float('percentage')->nullable();
            $table->string('faculty')->nullable();
            $table->string('alloted_category')->nullable();
            $table->string('college_name')->nullable();
            $table->string('college_code')->nullable();
            $table->string('major_subjects')->nullable();
            $table->string('admission_status')->nullable();
            $table->date('admission_date')->nullable();
            $table->string('minor_subjects')->nullable();
            $table->string('idc')->nullable();
            $table->string('mil')->nullable();
            $table->string('majorsec_subjects')->nullable();
            $table->string('vac')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merit_list_students', function (Blueprint $table) {
            $table->dropColumn([
                'application_id',
                'student_name',
                'fathers_name',
                'dob',
                'gender',
                'category',
                'domincile',
                'percentage',
                'faculty',
                'alloted_category',
                'college_name',
                'college_code',
                'major_subjects',
                'admission_status',
                'admission_date',
                'minor_subjects',
                'idc',
                'mil',
                'majorsec_subjects',
                'vac'
            ]);
        });
    }
};
