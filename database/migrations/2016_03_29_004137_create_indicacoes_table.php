<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicacaoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('indicacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->integer('empresa_id')->unsigned();
            $table->text('descricao');
            $table->string('situacao');
            $table->string('motivo_objecao')->nullable();
            //todo movimentacao[mudou status, registra o motivo]
            $table->timestamps();

            $table->foreign('cliente_id')
                ->references('id')
                ->on('clientes');
            $table->foreign('empresa_id')
                ->references('id')
                ->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('indicacoes');
    }
}
