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

        DB::table('assets')->insert([
            [ 'location' => 4, 'asset_type' => 1, 'Name' => "Frank's computer", 'Serial' => "S/N 123", 'Room' => "Frank Office" ],
            [ 'location' => 4, 'asset_type' => 2, 'Name' => "Frank's Laptop", 'Serial' => "S/N 234", 'Room' => "Frank Living Room" ],
            [ 'location' => 1, 'asset_type' => 2, 'Name' => "Joe's Laptop", 'Serial' => "S/N 345", 'Room' => "Sprint Space" ],
            [ 'location' => 3, 'asset_type' => 3, 'Name' => "Ampersand & && test", 'Serial' => "S/N 345", 'Room' => "Hello back caret <" ],
            [ 'location' => 2, 'asset_type' => 2, 'Name' => "Hello World test", 'Serial' => "00000345", 'Room' => "Unknown" ],
            [ 'location' => 5, 'asset_type' => 3, 'Name' => "This is a super duper long name just to see how the page and table handles super long stuff", 'Serial' => "S/N 345", 'Room' => "and again some really really really long text to be really obnoxious, expecially on phones" ],
        ]);

        Model::reguard();
    }
}
