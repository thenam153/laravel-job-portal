<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableRequest extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('idProject')->unsigned();

            $table->foreign('idProject')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idUserOwner')->unsigned();

            $table->foreign('idUserOwner')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idUserStaff')->unsigned();

            $table->foreign('idUserStaff')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->enum('status', ['pending', 'refused', 'accepted']);	

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
        Schema::dropIfExists('requests');
    }
}
