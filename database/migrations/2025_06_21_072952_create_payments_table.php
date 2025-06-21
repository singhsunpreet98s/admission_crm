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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');     // who paid
            $table->foreignId('course_id')->constrained()->onDelete('cascade');   // for which course
            $table->foreignId('semester_id')->constrained()->onDelete('cascade'); // for which semester
            $table->decimal('amount', 10, 2);
            $table->enum('method', ['razorpay', 'upi', 'cash', 'bank'])->default('razorpay');
            $table->string('razorpay_payment_id')->nullable();
            $table->enum('status', ['initiated', 'failed', 'success'])->default('initiated');
            $table->timestamp('paid_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
