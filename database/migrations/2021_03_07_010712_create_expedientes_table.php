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
            //para trabajar con un autoincrement como parte de la pk
            $table->engine = 'MyISAM';
            $table->date('fecha');
            $table->time('hora');
            $table->integer('nroRegistro',true,true);//name, autoincrement , unsigned
            $table->unsignedinteger('idOficinaEmisora');
            $table->foreign('idOficinaEmisora')->references('id')->on('oficinas');
            $table->unsignedinteger('idOficinaReceptora');
            $table->foreign('idOficinaReceptora')->references('id')->on('oficinas');
            $table->string('tipo',30);
            $table->text('descripcion')->nullable();
            $table->string('atencion',110)->nullable();
            $table->timestamps();
        });
        //pa evitar problemicas
        DB::unprepared('ALTER TABLE `expedientes` DROP PRIMARY KEY, ADD PRIMARY KEY (  `fecha` ,  `nroRegistro` )');
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
