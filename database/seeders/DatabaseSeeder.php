<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call([
        //creacion de usuarios con tipo y participantes
        UserTypeSeeder::class,
        UserSeeder::class,
        ParticipantsTypeSeeder::class,
        ParticipantsSeeder::class,
        //creacion de proyectos
        ProjectSeeder::class,
        
        //creacion de nombres de redes sociales y redes sociales
        SocialNetworkNameSeeder::class,
        SocialNetworksSeeder::class,
        //creacion de videos
        VideoSeeder::class,
        //creacion de podcast
        PodcastSeeder::class,
        //creacion de imageners
        PictureSeeder::class
      ]);
    }
}
