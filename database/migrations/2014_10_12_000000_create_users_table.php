<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('photo');
            $table->string("empresa");
            $table->string("cargo");
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
            $table->boolean("is_admin")->default(false);
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
        Schema::drop('users');
    }
}
