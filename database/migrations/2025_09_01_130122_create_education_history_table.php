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
        Schema::create('education_history', function (Blueprint $table) {
            $table->id();
            $table->string('roll_no');
            $table->string('roll_code');
            $table->string('passing_year');
            $table->string('board')->nullable();
            $table->string('stream')->nullable();
            $table->double('total_marks');
            $table->double('marks_obtained');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education_history');
    }
};
