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
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('customer_id')->nullable();
            $table->string('subscription_id')->nullable();
            $table->integer('amount');
            $table->string('plan_id')->nullable();
            $table->integer('total_count')->nullable();
            $table->integer('start_at');
            $table->string('status')->nullable();
            $table->integer('paid_count')->nullable();
            $table->timestamp('charge_at')->nullable();
            $table->string('short_url')->nullable();
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
        Schema::dropIfExists('subscriptions');
    }
};
