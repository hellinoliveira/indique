<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('indicacao_id');
//            dados básicos
            $table->string("nome");
            $table->string("ramo");
            $table->string("nome_contato");
            $table->string("cpnj");
            $table->string("endereco");
            $table->string("bairro");
            $table->string("cidade");
            $table->string("UF");
            $table->string("cargo_contato");
            $table->string("quantidade_alunos");
            $table->string("quantidade_unidades");
            $table->string("email");
            $table->string("telefone");
            $table->string("telefone_contato");
            $table->boolean("ativo");
            $table->timestamps();

            $table->foreign('indicacao_id')
                ->references('id')
                ->on('indicacoes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('empresas');
    }
}
