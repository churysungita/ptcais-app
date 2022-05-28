<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id('student_id');
            $table->unsignedBigInteger('user_id');
            $table->integer('age')->default(0);
            $table->enum('gender',['male','female']);
            $table->string('region');
            $table->string('district');
            $table->string('deo');
            $table->string('school_name',50);
            $table->string('head_teacher');
            $table->string('_class');
            $table->foreign('user_id')->references('user_id')->on('users');
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
};
