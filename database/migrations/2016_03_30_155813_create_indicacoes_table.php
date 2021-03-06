<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndicacoesTable extends Migration
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
            $table->integer('user_id')->unsigned();
            $table->text('descricao');
            $table->string('situacao');
            $table->string('nome_empresa');
            $table->string('ramo_empresa');
            $table->string('nome_contato');
            $table->string('cargo_contato');
            $table->string('cnpj')->nullable();
            $table->string('cidade');
            $table->string('UF');
            $table->string('endereco')->nullable();
            $table->string('bairro')->nullable();
            $table->string('quantidade_alunos')->nullable();
            $table->string('quantidade_unidades')->nullable();
            $table->string('valor_indicacao')->nullable();
            $table->string('telefone');
            $table->string('telefone_contato')->nullable();
            $table->string('motivo_objecao')->nullable();
            $table->string('observacao')->nullable();
//todo            campos preenchidos apos a proposta criada. Criar um servico rest para vincular as infos
            $table->date('data_implantacao')->nullable();
            $table->string('proposta')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users');
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
