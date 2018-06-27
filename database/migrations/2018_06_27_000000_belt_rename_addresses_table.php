<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltRenameAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::rename('addresses', 'locations');

        // SQLlite doesn't doesn't support multiple calls to renameColumn, dropColumn in single modification...

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('addressable_type', 'locatable_type');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('addressable_id', 'locatable_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // SQLlite doesn't doesn't support multiple calls to renameColumn, dropColumn in single modification...

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('locatable_type', 'addressable_type');
        });

        Schema::table('locations', function (Blueprint $table) {
            $table->renameColumn('locatable_id', 'addressable_id');
        });

        Schema::rename('locations', 'addresses');
    }
}
