<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialNetworksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \DB::table('social_networks')->insert([
        [
          "link" => "google.com",
          "social_network_name_id" => "1",
          'project_id' => 1,
        ],
        [
          "link" => "google.com2",
          "social_network_name_id" => "2",
          "project_id" => 1
        ],
      ]);

    }
}
