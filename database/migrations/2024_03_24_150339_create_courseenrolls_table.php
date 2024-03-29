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
        Schema::create('courseenrolls', function (Blueprint $table) {
            $table->id();
            $table->string('student_reg_no')->nullable;
            $table->string('pin_code')->nullable;
            $table->integer('session')->nullable;
            $table->integer('department')->nullable;
            $table->integer('level')->nullable;
            $table->integer('semester')->nullable;
            $table->integer('course')->nullable;
            $table->timestamp('enroll_date')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courseenrolls');
    }
};
