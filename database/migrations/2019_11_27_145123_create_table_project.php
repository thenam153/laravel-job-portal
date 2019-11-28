<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableProject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('idUser')->unsigned();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idCategory')->unsigned();

            $table->string('name');

            $table->text('content');

            $table->bigInteger('price');

            // $table->json('skill');

            // $table->json('file');

            $table->enum('status', ['start', 'active', 'done']);	

            $table->date('endDate')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
