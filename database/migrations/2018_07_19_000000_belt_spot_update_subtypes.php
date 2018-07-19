<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltSpotUpdateSubtypes extends Migration
{
    protected $tables = [
        'amenities',
        'deals',
        'events',
        'places',
    ];

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->renameColumn('template', 'subtype');
            });
            DB::statement("ALTER TABLE $table MODIFY COLUMN `subtype` VARCHAR(255) AFTER `id`");
        }

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        foreach ($this->tables as $table) {
            Schema::table($table, function (Blueprint $table) {
                $table->renameColumn('subtype', 'template');
            });
        }
    }
}
