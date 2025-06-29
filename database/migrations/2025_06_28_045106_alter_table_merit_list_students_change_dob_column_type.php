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
        Schema::table('merit_list_students', function (Blueprint $table) {
            $table->string('dob')->nullable()->change();
            $table->string('admission_date')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('merit_list_students', function (Blueprint $table) {
            $table->date('dob')->nullable()->change();
            $table->date('admission_date')->nullable()->change();
        });
    }
};
