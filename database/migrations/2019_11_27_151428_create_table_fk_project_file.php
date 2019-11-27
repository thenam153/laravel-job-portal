<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFkProjectFile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fk_file_projects', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('idFile')->unsigned();

            $table->foreign('idFile')->references('id')->on('files')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idProject')->unsigned();

            $table->foreign('idProject')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fk_file_projects');
    }
}
