<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltUpdateRatableTables2 extends Migration
{

    /**
     * @var array
     */
    private $tables = ['deals', 'events', 'places'];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $table_name) {
            Schema::table($table_name, function (Blueprint $table) {
                $table->index('rating');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $table_name) {
            Schema::table($table_name, function (Blueprint $table) use ($table_name) {
                $table->dropIndex($table_name . '_rating_index');
            });
        }
    }
}