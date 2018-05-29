<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Useradmin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('useradmin', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Usuario_id');
            $table->string('Nombres', 20);
            $table->string('Apellidos', 20);
            $table->string('password');
            $table->string('login', 15);
            $table->string('remember_token')->nullable();
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
        //
    }
}
