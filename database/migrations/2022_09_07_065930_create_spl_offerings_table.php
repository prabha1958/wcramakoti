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
        Schema::create('spl_offerings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->date('date_of_payment')->nullable();
            $table->integer('amount');
            $table->text('purpose');
            $table->string('payment_id')->nullable();
            $table->string('order_id')->nullable();
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
        Schema::dropIfExists('spl_offerings');
    }
};
