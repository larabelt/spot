<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BeltCreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('team_id')->nullable()->index();
            $table->integer('attachment_id')->nullable();
            $table->string('template')->default('default');
            $table->boolean('is_active')->default('0')->index();
            $table->boolean('is_searchable')->default('0')->index();
            $table->tinyInteger('status')->default('0')->index();
            $table->string('name')->index();
            $table->string('slug')->index();
            $table->text('intro')->nullable();
            $table->text('body')->nullable();
            $table->text('hours')->nullable();
            $table->string('url')->nullable();
            $table->string('email', 100)->nullable();
            $table->string('phone', 25)->nullable();
            $table->string('phone_tollfree', 25)->nullable();
            $table->integer('capacity')->nullable();
            $table->string('meta_title')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_keywords')->nullable();
            $table->dateTime('starts_at')->nullable();
            $table->dateTime('ends_at')->nullable();
            $table->text('searchable')->nullable();
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
        Schema::drop('events');
    }
}
