<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PictureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('pictures')->insert([
            [
              "title" => "loros orejiamarillo",
              "description" => "El loro orejiamarillo es muy conocido por sus colores, canto y tamaño siendo uno de los más populares del pcc",
              "link" => "https://caracol.com.co/resizer/64WSR714FAxVHbtVeh-CvlPt5PQ=/650x488/filters:format(jpg):quality(70)/cloudfront-us-east-1.images.arcpublishing.com/prisaradioco/GUY5A47GBVPYLJGXKWY67NEQWI.jpg",
              'project_id' => 1,
            ],
            [
                "title" => "loro orejiamarillo reposando",
                "description" => "En esta foto se puede apreciar un loro orejiamarillo reposando",
                "link" => "https://upload.wikimedia.org/wikipedia/commons/2/25/Ognorhynchus_icterotis_-Colombia-8.jpg",
                'project_id' => 1,
              ],
          ]);
    }
}
