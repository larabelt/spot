<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltCreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('addressable_id');
            $table->string('addressable_type');

            $table->boolean('is_active')->default(1)->index();
            $table->boolean('is_locked')->default(0)->index();

            $table->string('nickname', 25)->nullable();
            $table->string('name', 100)->nullable();
            $table->string('line1', 100)->nullable();
            $table->string('line2', 100)->nullable();
            $table->string('line3', 100)->nullable();
            $table->string('line4', 100)->nullable();
            $table->string('locality', 100)->nullable()->index();
            $table->string('sub_locality', 100)->nullable()->index();
            $table->string('postcode', 25)->nullable()->index();
            $table->string('region', 100)->nullable()->index();
            $table->string('country', 2)->default('US')->index();

            $table->string('original')->nullable();
            $table->string('formatted')->nullable();

            $table->string('geo_service')->nullable();
            $table->string('geo_code')->nullable();

            # lat & lng
            $table->decimal('lat', 9, 6)->nullable();
            $table->decimal('north_lat', 9, 6)->nullable();
            $table->decimal('south_lat', 9, 6)->nullable();
            $table->decimal('lng', 9, 6)->nullable();
            $table->decimal('east_lng', 9, 6)->nullable();
            $table->decimal('west_lng', 9, 6)->nullable();

            $table->float('delta')->default(1)->index();
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
        Schema::dropIfExists('addresses');
    }
}
