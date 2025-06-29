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
        Schema::table('merit_list_files', function (Blueprint $table) {
            $table->string('program_name');
            $table->foreignId('course_id')->nullable()->constrained('courses');
            $table->date('session_start')->nullable();
            $table->date('session_end')->nullable();
            $table->string('session_name');
            $table->integer('list_number')->max(5);
            $table->foreignId('semester_id')->nullable()->constrained('semesters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merit_list_files', function (Blueprint $table) {
            $table->dropForeign(['course_id']);
            $table->dropForeign(['semester_id']);
            $table->dropColumn([
                'program_name',
                'course_id',
                'session_start',
                'session_end',
                'session_name',
                'semester_id',
                'list_number'
            ]);
        });
    }
};
