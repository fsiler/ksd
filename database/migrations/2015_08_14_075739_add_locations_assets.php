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
            $table->text('Location');
            $table->unique('Location');
            $table->nullabletimestamps();
        });

        Schema::create('asset_types', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Type');
            $table->unique('Type');
            $table->nullabletimestamps();
        });

        // TODO: make this an insertable view rather than a table
        Schema::create('assets', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('location_id')->unsigned();
            $table->foreign('location_id')->references('id')->on('locations')->onUpdate("Cascade")->onDelete("Restrict");
            $table->integer('asset_type')->unsigned();
            $table->foreign('asset_type')->references('id')->on('asset_types')->onUpdate("Cascade")->onDelete("Restrict");

            $table->text('Name');
            $table->text('Serial');
            $table->text('Room');
            $table->date('Date')->default(gmdate(DATE_ISO8601)); // assuming this should not be editable
            $table->nullabletimestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assets');
        Schema::drop('locations');
        Schema::drop('asset_types');
    }
}
