<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        "nome", "email", "senha", "empresa", "cargo", "data_nascimento",
        "endereco", "bairro", "cep", "cidade", "UF", "telefone",
        "telefone_contato", "banco", "agencia", "conta",
        "operacao", "nome_titular_conta",
        "cpf_titular_conta"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'senha', 'remember_token',
    ];


    /**
     *Um usuario pode possuir varias indicacoes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicacoes()
    {
        return $this->hasMany('App\Article');
    }
}
