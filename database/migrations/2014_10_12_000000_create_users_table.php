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
            $table->string('photo')->default('blank_user.jpg');
            $table->string("empresa")->nullable();
            $table->string("cargo")->nullable();
            $table->string("endereco")->nullable();
            $table->string("bairro")->nullable();
            $table->string("cep")->nullable();
            $table->string("cidade")->nullable();
            $table->string("UF")->nullable();
            $table->string("telefone")->nullable();
            $table->string("telefone_contato")->nullable();
            $table->text("observacao")->nullable(); //visivel apenas no painel adm
//            dados bancarios
            $table->string("banco")->nullable();
            $table->string("agencia")->nullable();
            $table->string("conta")->nullable();
            $table->string("operacao")->nullable();
            $table->string("nome_titular_conta")->nullable();
            $table->string("cpf_titular_conta")->nullable();
            $table->boolean("is_admin")->default(false);
            $table->boolean("is_ativo")->default(true);
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
