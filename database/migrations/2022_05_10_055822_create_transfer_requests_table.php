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
        Schema::create('transfer', function (Blueprint $table) {
            $table->id('transfer_id');
            $table->unsignedBigInteger('student_id');
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name');
            $table->integer('age')->default(0);
            $table->enum('gender',['male','female']);
            $table->string('regionFrom');
            $table->string('districtFrom');
            //ward forgotten
            $table->string('schoolFrom');
            $table->string('regionTo');
            $table->string('districtTo');
            $table->string('schoolTo');
            $table->string('reason');
            $table->timestamps();
            //More reason forgotten in deo table
            $table->string('more_reason')->nullable();
            $table->string('HT_status')->nullable();
            $table->string('DEO_status')->nullable();
            $table->foreign('student_id')->references('student_id')->on('students');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transfer_requests');
    }
};
