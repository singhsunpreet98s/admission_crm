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
        Schema::table('education_history', function (Blueprint $table) {
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->bigInteger('student_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('education_history', function (Blueprint $table) {
            $table->dropColumn(['name', 'title', 'student_id']);
        });
    }
};
