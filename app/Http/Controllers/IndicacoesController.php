<?php

namespace App\Http\Controllers;

use App\Enums\RamoEmpresa;
use App\Enums\SituacaoIndicacao;
use App\Http\Requests\IndicacaoRequest;
use App\Indicacao;
use Illuminate\Support\Facades\Auth;

class IndicacoesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Mostra todas indicacoes ao adm ou as indicacoes do usuário
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        if (Auth::User()->is_admin) {
            $indicacoes = Indicacao::latest()->get();

            return view('indicacoes.list', compact('indicacoes'));

        } else {
            $indicacoes = Auth::user()->indicacoes()->latest()->get();

            return view('indicacoes.index', compact('indicacoes'));
        }
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
        $situacoes = SituacaoIndicacao::getEnumValues();
        $ramos = RamoEmpresa::getEnumValues();
        return view('indicacoes.create', compact('situacoes', 'ramos'));
    }

    /**
     * cria a indicação e vincula com o usuário
     * @param IndicacaoRequest $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(IndicacaoRequest $request)
    {
        $request->offsetSet('situacao', SituacaoIndicacao::ANALISE);
        Auth::user()->indicacoes()->create($request->all());

        return view('indicacoes.index');
    }

    public function update(IndicacaoRequest $request, $id)
    {
        $indicacao = Indicacao::findOrFail($id);

        $request->offsetSet('situacao_atual', $request['situacao']);
        $indicacao->update($request->all());
        if ($request['situacao'] != $request['situacao_anterior']) {
            $indicacao->movimentacoes()->create($request->all());
        }

        return redirect('indicacoes');

    }

    public function edit($id)
    {
        $indicacao = Indicacao::findOrFail($id);
        $situacoes = SituacaoIndicacao::getEnumValues();
        $ramos = RamoEmpresa::getEnumValues();

        return view('indicacoes.edit', compact('indicacao', 'situacoes', 'ramos'));
    }

}