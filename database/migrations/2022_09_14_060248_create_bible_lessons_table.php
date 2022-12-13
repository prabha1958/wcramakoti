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
        Schema::create('bible_lessons', function (Blueprint $table) {
            $table->id();
            $table->date('dt');
            $table->string('verse1');
            $table->text('lesson1');
            $table->string('verse2');
            $table->text('lesson2');
            $table->string('verse3');
            $table->text('lesson3');
            $table->string('verse4');
            $table->text('lesson4');
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
        Schema::dropIfExists('bible_lessons');
    }
};
