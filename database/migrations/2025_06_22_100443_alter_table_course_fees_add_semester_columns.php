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
        Schema::table('course_fees', function (Blueprint $table) {
            $table->foreignId('semester_id')->nullable()->constrained('semesters');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('course_fees', function (Blueprint $table) {
            $table->dropForeign(['semester_id']); // drop FK constraint first
            $table->dropColumn('semester_id');    // then drop the column
        });
    }
};
