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
        Schema::create('bible_quizzes', function (Blueprint $table) {
            $table->id();
            $table->string('question');
            $table->string('optn1');
            $table->string('optn2');
            $table->string('optn3');
            $table->string('optn4');
            $table->string('ans');
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
        Schema::dropIfExists('bible_quizzes');
    }
};
