<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialNetworkNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('social_network_names')->insert([
        [
          "name" => "facebook",
        ],
        [
          "name" => "instagram",
        ],
      ]);
    }
}
