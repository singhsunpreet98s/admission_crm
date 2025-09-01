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
            $table->bigInteger('major_subject')->nullable();
            $table->bigInteger('minor_subject')->nullable();
            $table->bigInteger('idc')->nullable();
            $table->bigInteger('aec')->nullable();
            $table->bigInteger('sec')->nullable();
            $table->bigInteger('vac')->nullable();
            $table->string('program')->nullable();
            $table->bigInteger('file_id')->nullable();
            $table->bigInteger('file_student_id')->nullable();
            $table->string('reg_no')->nullable();
            $table->string('application_id')->nullable();
            $table->bigInteger('acadmic_session_id')->nullable();
            $table->double('fees')->nullable();
            $table->double('tax')->nullable();
            $table->double('total_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('admissions', function (Blueprint $table) {
            $table->dropColumn([
                'major_subject',
                'minor_subject',
                'idc',
                'aec',
                'sec',
                'vac',
                'program',
                'acadmic_session_id',
                'file_id',
                'file_student_id',
                'reg_no',
                'application_id',
                'fees',
                'tax',
                'total_amount'
            ]);
        });
    }
};
