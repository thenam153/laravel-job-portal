<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNotify extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifys', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('idUserOwner')->unsigned();

            $table->foreign('idUserOwner')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idProject')->unsigned();

            $table->foreign('idProject')->references('id')->on('projects')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idUserStaff')->unsigned();

            $table->foreign('idUserStaff')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');

            $table->text('content');

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
        Schema::dropIfExists('notifys');
    }
}
