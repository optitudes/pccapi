<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //creating user types
      \DB::table('user_types')->insert(
        [
          [
            'name' => 'Root', 
            'description' => 'Posee todos los permisos sobre el sistema', 
            'level_access' => '0', 
          ],
          [
            'name' => 'Moderador', 
            'description' => 'Administra a los administradores de proyectos, los puede crear y eliminar o suspender', 
            'level_access' => '1', 
          ],
          [
            'name' => 'Administrador de proyectos', 
            'description' => 'Crea y administra proyectos', 
            'level_access' => '2', 
          ],
          [
            'name' => 'Gestor de contenidos', 
            'description' => 'Crea y administra el contenido de los proyectos en los que se encuentra registrado', 
            'level_access' => '3', 
          ],
          [
            'name' => 'Usuario', 
            'description' => 'Administra su propia información, participa activamente en la promoción del paisaje cultural cafetero', 
            'level_access' => '4', 
          ]
        ]
      );
    }
}
