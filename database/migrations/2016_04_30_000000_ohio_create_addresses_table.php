<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OhioCreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function ($table) {

            $table->increments('id');
            $table->integer('addressable_id');
            $table->string('addressable_type');

            $table->string('line1')->nullable();
            $table->string('line2')->nullable();
            $table->string('line3')->nullable();
            $table->string('line4')->nullable();
            $table->string('locality')->nullable()->index();
            $table->string('postcode', 10)->nullable()->index();
            $table->string('region', 50)->nullable()->index();
            $table->string('country', 2)->default('US')->index();

            $table->float('delta')->default(1)->index();
            $table->softDeletes();
            $table->timestamps();
        });

//        $table->increments('id');
//        $table->integer('user_id')->nullable()->index('addresses_customer_id_index');
//        $table->integer('shop_id')->nullable()->index('addresses_vendor_id_index');
//        $table->integer('locale_id')->nullable()->index();
//        $table->integer('addressable_id')->index();
//        $table->string('addressable_type', 100)->index();
//        $table->boolean('locked')->nullable();
//        $table->boolean('active')->nullable()->default(1)->index();
//        $table->boolean('unique')->nullable();
//        $table->boolean('verified')->nullable();
//        $table->string('name', 45)->nullable()->default('');
//        $table->string('address1', 45)->nullable()->default('');
//        $table->string('address2', 45)->nullable();
//        $table->decimal('lat', 10, 8)->nullable();
//        $table->decimal('lng', 10, 8)->nullable();
//        $table->timestamps();
//        $table->string('original_address', 150)->nullable();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('addresses');
    }
}
