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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('event_name');
            // $table->string('start_time');
            // $table->string('end_time');
            // $table->string('am_pm_1');
            // $table->string('am_pm_2');
            $table->foreignId('room_id')->references('id')->on('rooms');
            $table->dateTime('starts_at');
            $table->dateTime('ends_at')->nullable()->default(NULL);
            $table->tinyInteger('visible')->nullable()->default('0');

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
        Schema::dropIfExists('events');
    }
};
