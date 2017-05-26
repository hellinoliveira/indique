<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IndicacaoRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'descricao' => 'required',
            'nome_empresa' => 'required',
            'ramo_empresa' => 'required',
            'nome_contato' => 'required',
            'cargo_contato' => 'required',
            'cidade' => 'required',
            'UF' => 'required',
            'telefone' => 'required|min:3'
        ];
    }
}
