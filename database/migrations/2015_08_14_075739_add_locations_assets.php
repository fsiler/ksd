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
        Schema::create('assets_raw', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('location')->unsigned();
            $table->foreign('location')->references('id')->on('locations')->onUpdate("Cascade")->onDelete("Restrict");
            $table->integer('asset_type')->unsigned();
            $table->foreign('asset_type')->references('id')->on('asset_types')->onUpdate("Cascade")->onDelete("Restrict");

            $table->text('Name');
            $table->text('Serial');
            $table->text('Room');
            $table->date('Date')->default(gmdate(DATE_ISO8601)); // assuming this should not be editable
            $table->nullabletimestamps();
        });
        DB::raw("create view if not exists assets as
                select assets_raw.id as id, locations.location as Location, locations.id as locid, asset_types.type as Type, asset_types.id as tid,
                Name, Serial, Room, Date
                    from assets_raw, asset_types, locations
                        where assets_raw.location=locations.id and assets_raw.asset_type=asset_types.id;
            ");
        DB::raw("create trigger if not exists assets_update INSTEAD OF UPDATE OF locid on assets update assets_raw set location=locid where assets.id=id");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('assets_raw');
        Schema::drop('locations');
        Schema::drop('asset_types');
        DB::raw("DROP VIEW IF EXISTS assets;");
    }
}
