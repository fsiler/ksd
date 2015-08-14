<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLocationsAssets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->text('location');
            $table->timestamps();
        });

        Schema::create('asset_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('type');
            $table->timestamps();
        });

        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('serial');
            $table->text('room');
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
        Schema::drop('locations');
        Schema::drop('assets');
        Schema::drop('asset_types');
    }
}
