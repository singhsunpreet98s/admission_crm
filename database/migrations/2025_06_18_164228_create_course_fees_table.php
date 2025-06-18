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
        Schema::create('course_fees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('course_id')->constrained();
            $table->foreignId('category_id')->nullable()->constrained();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('fee_head');
            $table->decimal('amount', 10, 2);
            $table->integer('period_number'); // e.g., Semester 1 or Year 2
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_fees');
    }
};
