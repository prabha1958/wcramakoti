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
        Schema::create('poor_feedings', function (Blueprint $table) {
            $table->id();
            $table->date('dt_of_pf');
            $table->integer('no_meals');
            $table->string('pf_photo1');
            $table->string('pf_photo2');
            $table->string('pf_photo3')->nullable();
            $table->string('pf_photo4')->nullable();
            $table->text('summary');
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
        Schema::dropIfExists('poor_feedings');
    }
};
