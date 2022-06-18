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
        Schema::create('deo', function (Blueprint $table) {
            $table->id('deo_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('region',20);
            $table->string('district',20);
            $table->timestamps();
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
        Schema::dropIfExists('deo');
    }
};
