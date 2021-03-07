<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpedientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expedientes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('idOficinaEmisora');
            $table->foreign('idOficinaEmisora')->references('id')->on('oficinas');
            $table->unsignedinteger('idOficinaReceptora');
            $table->foreign('idOficinaReceptora')->references('id')->on('oficinas');
            $table->string('tipo',30);
            $table->text('descripcion')->nullable();
            $table->string('atencion',110)->nullable();
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
        Schema::dropIfExists('expedientes');
    }
}
