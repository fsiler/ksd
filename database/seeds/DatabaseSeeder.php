<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // XXX: don't forget trailing commas
        DB::table('asset_types')->insert([
            [ 'created_at' => "2013-10-07 08:23:19.120", 'updated_at' => "now", 'Type' => "Computer (Desktop)" ],
            [ 'created_at' => "2013-10-07 08:23:19.120", 'updated_at' => "now", 'Type' => "Computer (Chair)" ],
            [ 'created_at' => "2013-10-07 08:23:19.120", 'updated_at' => "now", 'Type' => "Desk" ]
        ]);

        DB::table('locations')->insert([
            [ 'Location' => "KCMo" ],
            [ 'Location' => "Topeka" ],
            [ 'Location' => "Wichita" ],
            [ 'Location' => "Lawrence" ],
            [ 'Location' => "Ampersand & Test" ]
        ]);

        // TODO: make this an insertable view rather than a table
        DB::table('assets')->insert([
            [ 'location_id' => 4, 'asset_type' => 1, 'Name' => "Frank's computer", 'Serial' => "S/N 123", 'Room' => "Frank Office" ],
            [ 'location_id' => 4, 'asset_type' => 2, 'Name' => "Frank's Laptop", 'Serial' => "S/N 234", 'Room' => "Frank Living Room" ],
            [ 'location_id' => 1, 'asset_type' => 2, 'Name' => "Joe's Laptop", 'Serial' => "S/N 345", 'Room' => "Sprint Space" ],
            [ 'location_id' => 5, 'asset_type' => 3, 'Name' => "Ampersand & && test", 'Serial' => "S/N 345", 'Room' => "Hello back caret <" ],
            [ 'location_id' => 1000000, 'asset_type' => 3, 'Name' => "Ampersand & && test", 'Serial' => "S/N 345", 'Room' => "Should break referential integrity" ]
        ]);

        Model::reguard();
    }
}
