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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['student', 'staff', 'admin']);
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('university_reg_no')->nullable()->unique();
            $table->text('address')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('signature_path')->nullable();
            $table->foreignId('session_id')->nullable()->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role', 'gender', 'category_id', 'university_reg_no', 'address', 'photo_path', 'signature_path', 'session_id']);
        });
    }
};
