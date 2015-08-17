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

        DB::table('assets')->insert([
            [ 'location_id' => 10000000, 'asset_type' => 1, 'Name' => "Frank's computer", 'Serial' => "S/N 123", 'Room' => "Frank Office" ],
        ]);

        Model::reguard();
    }
}
