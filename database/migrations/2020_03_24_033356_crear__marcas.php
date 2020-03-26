<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearMarcas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Marcas', function (Blueprint $table) {
            $table->increments('MarcaId');
            $table->integer('ProveedorId')->unsigned();
            $table->string('Codigo')->unique();
            $table->string('Nombre')->unique();
            $table->foreign('ProveedorId')->references('ProveedorId')->on('Proveedores');

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
        Schema::dropIfExists('Marcas');
    }
}
