<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ParticipantsTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //creacion de los tipos de participantes
      \DB::table('participants_types')->insert(
        [
          [
            'name' => 'Investigador principal',
            'description' => 'El investigador principal es el líder del proyecto de investigación.
                             Es responsable de diseñar, planificar y supervisar el estudio.
                             También coordina a los demás miembros del equipo y toma decisiones clave relacionadas con el proyecto.', 
            'code' => 1,
          ],
          [
            'name' => 'Co-investigador',
            'description' => 'Los co-investigadores son colaboradores clave en el proyecto de investigación.
                              Trabajan estrechamente con el investigador principal y contribuyen a la planificación y ejecución del estudio.
                              Pueden tener responsabilidades específicas, como recopilación y análisis de datos, revisión de literatura, redacción de informes, entre otros.', 
            'code' => 2,
          ],
          [
            'name' => 'Asistente de Investigacións',
            'description' => 'Los asistentes de investigación brindan apoyo administrativo y técnico al proyecto.
                              Ayudan en tareas como la recopilación de datos, la preparación de materiales, la organización de reuniones y la gestión de la logística general del proyecto.
                              También pueden desempeñar un papel importante en la coordinación con los participantes del estudio.', 
            'code' => 3,
          ],
          [
            'name' => 'Revisor o Evaluador',
            'description' => 'Los revisores o evaluadores son expertos en el campo de investigación específico del proyecto.
                              Su función principal es revisar y evaluar los trabajos de investigación antes de su publicación.
                              Estos participantes desempeñan un papel crítico en el proceso de revisión por pares, proporcionando comentarios y sugerencias para mejorar la calidad de la investigación.
                              También pueden participar en la evaluación de propuestas de financiamiento de investigación.', 
            'code' => 4,
          ]

        ]
      );
    }
}
