<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
//            dados básicos
            $table->string("nome");
            $table->string("email")->unique();
            $table->string("senha");
//            dados complementares
            $table->string("empresa");
            $table->string("cargo");
            $table->date("data_nascimento");
            $table->string("endereco");
            $table->string("bairro");
            $table->string("cep");
            $table->string("cidade");
            $table->string("UF");
            $table->string("telefone");
            $table->string("telefone_contato");
//            dados bancarios
            $table->string("banco");
            $table->string("agencia");
            $table->string("conta");
            $table->string("operacao");
            $table->string("nome_titular_conta");
            $table->string("cpf_titular_conta");
            $table->boolean("ativo");
            $table->rememberToken();
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
        Schema::drop('clientes');
    }
}
