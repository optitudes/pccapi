<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creating the projects default
      \DB::table('projects')->insert(
        [
          [
            'name' => 'Loros quindianos y su diversidad', 
            'banner' => 'https://estaticos-cdn.elperiodico.com/clip/9a36bb77-0c88-4b3c-a7dc-f3d41dd85987_alta-libre-aspect-ratio_default_0.jpg',
          ],
          [
            'name' => 'Ranas exoticas del quindio',
            'banner' => 'https://imagenes.muyinteresante.es/files/vertical_composte_image/uploads/2022/10/12/6346c8ee3a8c3.jpeg',
          ]
        ]
      );
    
    }
}
