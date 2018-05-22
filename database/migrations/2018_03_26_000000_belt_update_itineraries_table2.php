<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Belt\Spot\Itinerary;

class BeltUpdateItinerariesTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->boolean('is_active')->default('0')->index();
            $table->boolean('is_searchable')->default('0')->index();
            $table->tinyInteger('status')->default('0')->index();
        });

        Itinerary::unguard();
        Itinerary::query()->update(['is_active' => 1]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itineraries', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('is_searchable');
            $table->dropColumn('status');
        });
    }
}