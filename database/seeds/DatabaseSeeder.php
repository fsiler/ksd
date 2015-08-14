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

        // $this->call(UserTableSeeder::class);
        DB::table('asset_types')->insert([ 'created_at' => "2013-10-07 08:23:19.120", 'updated_at' => "now", 'Type' => "Computer" ]);
        DB::table('asset_types')->insert([ 'Type' => "Desk" ]);
        DB::table('locations')->insert([ 'Location' => "KCK" ]);
        DB::table('locations')->insert([ 'Location' => "Topeka" ]);
        DB::table('assets')->insert([ 'location_id' => 1, 'asset_type' => 1, 'Name' => "Frank's computer", 'Serial' => "S/N 123", 'Room' => "Frank Office" ]);

        Model::reguard();
    }
}
