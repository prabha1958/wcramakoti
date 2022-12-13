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
        Schema::create('church_services', function (Blueprint $table) {
            $table->id();
            $table->date('dt_service');
            $table->string('time');
            $table->string('theme');
            $table->string('theme_photo')->nullable();
            $table->text('sermon');
            $table->string('audience_photo');
            $table->string('choir_photo');
            $table->string('pastor_photo');
            $table->foreignId('pastor_id')->constrained('pastors');
            $table->foreignId('biblelesson_id')->constrained('bible_lessons');
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
        Schema::dropIfExists('church_services');
    }
};
