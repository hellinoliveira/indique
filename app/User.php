<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'empresa', 'cargo',
        'endereco', 'bairro', 'cep', 'cidade', 'UF', 'telefone',
        'telefone_contato', 'banco', 'agencia', 'conta',
        'operacao', 'nome_titular_conta',
        'cpf_titular_conta'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'is_admin'
    ];

    protected function getPhoto()
    {
        if ($this->getPhoto() == '') {
            return 'blank_user.jpg';
        }
    }


    /* @param string $username The username
     * @param string $password Plain text password
     * @return bool|user The user if the password matches the user's stored password, false otherwise.
     */
    public function authenticate($username, $password)
    {
        $user = User::where('username', $username)->first();
        if (!Hash::check($password, $user->password)) {
            return false;
        }
        return $user;
    }

    /**
     *Um usuario pode possuir varias indicacoes
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function indicacoes()
    {
        return $this->hasMany('App\Indicacao');
    }

    public function getTotalIndicacoesAttribute()
    {
        return $this->hasMany('App\Indicacao')->where('user_id', $this->user_id)->count();
    }

}
