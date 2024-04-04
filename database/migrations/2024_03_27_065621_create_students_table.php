<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('regNo');
            $table->string('studentPhoto')->nullable();
            $table->string('password');
            $table->string('studentName');
            $table->string('pincode')->nullable();
            $table->string('session')->nullable();
            $table->string('department')->nullable();
            $table->string('semester')->nullable();
            $table->string('cgpa')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
