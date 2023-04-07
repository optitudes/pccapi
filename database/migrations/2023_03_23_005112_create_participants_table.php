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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            //relacion con el tipo de participante
            $table->unsignedBigInteger('participant_type_id')->nullable();
            $table->foreign('participant_type_id')->references('id')->on('participants_types')->onDelete('set null');
            //relacion con el usuario
            $table->unsignedBigInteger('user_id')->unique()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('set null')->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
};
