<?php

namespace App\Http\Controllers;

use App\Empresa;
use App\Enums\SituacaoIndicacao;
use App\Indicacao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndicacoesController extends Controller
{
    /**
     * Mostra todas indicacoes ao adm ou as indicacoes do usuário
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::User()->is_admin) {
            $indicacoes = Indicacao::latest()->get();
        } else {
            $indicacoes = Auth::user()->indicacoes()->latest()->get();
        }


        return view('indicacoes.index', compact('indicacoes'));
    }

    /**
     * Detalha uma indicacao
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $indicacao = Indicacao::find($id);
        return view('indicacoes.edit', compact('indicacao'));
    }

    /**
     * Nova indicacao
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('indicacoes.create');
    }

    /**
     * cria a indicação e vincula com o usuário
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $request->offsetSet('situacao', SituacaoIndicacao::ANALISE);
        Auth::user()->indicacoes()->create($request->all());

        return view('indicacoes.index');
    }

}