<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriarTabelaAtendimentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atendimentos', function (Blueprint $table) {
            $table->id();
            $table->text('descricao_problema');
            $table->text('descricao_fechamento');
            $table->date('data_abertura');
            $table->date('data_fechamento');
            $table->string('status');
            $table->unsignedBigInteger('id_maquina');
            $table->timestamps();
            
        });

        Schema::table('atendimentos', function (Blueprint $table) {
           
            $table->foreign('id_maquina')->references('id')->on('maquinas')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('atendimentos');
    }
}
