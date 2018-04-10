<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltCreateItineraryPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itinerary_place', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('itinerary_id')->index();
            $table->integer('place_id')->index();
            $table->integer('position')->nullable()->default(1);
            $table->string('heading')->nullable();
            $table->text('body')->nullable();
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
        Schema::drop('itinerary_place');
    }
}
