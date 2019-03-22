<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hotel_id');
            $table->integer('status_id');
            $table->integer('room_number');
            $table->integer('floor');
            $table->string('description')->nullable();
            $table->float('price')->nullable();
            $table->float('tax')->nullable();
            $table->float('fee')->nullable();
            $table->string('cancellation_policies')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('rooms');
    }
}
