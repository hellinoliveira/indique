<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovimentacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->increments('id');
            $table->string("indicacao_id");
            $table->string("situacao_anterior");
            $table->string("situacao_atual");
            $table->string("observacao");
            $table->boolean("lido");
            $table->timestamps();


            $table->foreign('indicacao_id')
                ->references('indicacoes')
                ->on('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('movimentacoes');
    }
}
