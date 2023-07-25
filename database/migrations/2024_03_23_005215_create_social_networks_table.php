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
        Schema::create('social_networks', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("link");
            $table->timestamp('deleted_at')->nullable();

            //relations with the social network name
            $table->unsignedBigInteger('social_network_name_id')->nullable();
            $table->foreign('social_network_name_id')->references('id')->on('social_network_names')->onDelete('set null');

            //relacion con el proyecto
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('social_networks');
    }
};
