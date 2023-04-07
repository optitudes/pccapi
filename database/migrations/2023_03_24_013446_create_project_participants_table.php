<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      //tabla intermedia entre los proyectos y los participantes
        Schema::create('project_participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('project_id')->nullable();
            $table->unsignedBigInteger('participant_id')->nullable();
            //declaracion de las llaves foraneas
            $table->foreign('project_id')->references("id")->on('projects')->onDelete('set null');
            $table->foreign('participant_id')->references("id")->on('participants')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_participants');
    }
};
