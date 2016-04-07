<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    public function indicacao()
    {
        return $this->belongsTo('App\Indicacao');
    }
}
