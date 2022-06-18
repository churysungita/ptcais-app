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
        Schema::create('schools', function (Blueprint $table) {
            $table->id('id');
            $table->string('registration_number');
            $table->string('school_name');
            $table->string('region');
            $table->string('district');
            $table->string('head_teacher_name')->nullable();
            $table->enum('status',['government','private']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('school_models');
    }
};
