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
        Schema::create('student_personal_details', function (Blueprint $table) {
            $table->id();
            $table->string('fathers_name')->nullable();
            $table->string('mothers_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();
            $table->bigInteger('categoryId')->nullable();
            $table->bigInteger('user_id')->nullable();
            $table->string('religion')->nullable();
            $table->string('aadhar_no')->nullable();
            $table->boolean('hasEWS')->nullable()->default(false);
            $table->string('disabled_category')->nullable();
            $table->string('mobile')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('pincode')->nullable();
            $table->string('profile_photo')->nullable();
            $table->string('signature')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_personal_details');
    }
};
