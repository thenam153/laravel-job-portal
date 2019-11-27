<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFkSkillUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fk_skill_users', function (Blueprint $table) {
            $table->bigIncrements('id');
            
            $table->bigInteger('idSkill')->unsigned();

            $table->foreign('idSkill')->references('id')->on('skills')->onDelete('cascade')->onUpdate('cascade');

            $table->bigInteger('idUser')->unsigned();

            $table->foreign('idUser')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fk_skill_users');
    }
}
