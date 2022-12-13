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
        Schema::create('poorfeeding_user', function (Blueprint $table) {
            $table->unsignedBigInteger('poor_feeding_id');
            $table->unsignedBigInteger('user_id');

            $table->foreign('poor_feeding_id')->references('id')->on('poor_feedings')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poorfeeding_user');
    }
};
