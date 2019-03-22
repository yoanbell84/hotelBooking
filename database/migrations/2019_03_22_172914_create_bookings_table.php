<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->datetime('time_from')->nullable();
            $table->datetime('time_to')->nullable();
            $table->float('amount', 8, 2);
            $table->float('fee', 8, 2);
            $table->float('tax', 8, 2);
            $table->text('additional_information')->nullable();
            $table->integer('customer_id');
            $table->integer('room_id');
            $table->integer('hotel_id');
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
        Schema::dropIfExists('bookings');
    }
}
