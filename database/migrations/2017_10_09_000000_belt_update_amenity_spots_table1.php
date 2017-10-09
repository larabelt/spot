<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltUpdateAmenitySpotsTable1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amenity_spots', function (Blueprint $table) {
            $table->text('value')->nullable()->after('amenity_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amenity_spots', function (Blueprint $table) {
            $table->dropColumn('value');
        });
    }
}