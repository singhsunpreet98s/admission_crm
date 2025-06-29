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
            $table->dropForeign(['course_id']); // drop FK constraint first
            $table->dropColumn('course_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merit_list_files', function (Blueprint $table) {
            $table->foreignId('course_id')->constrained('courses')->onDelete('cascade');
        });
    }
};
