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
            $indicacoes = Empresa::all();
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
        $empresa = Empresa::where('indicacao_id' , '=' , $id)->get();
        return view('indicacoes.edit', compact('indicacao', 'empresa'));
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
     * preenche e salva a indicação
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $inputEmpresa = $this->preencherSalvarIndicacao($input);
        Empresa::create($inputEmpresa);

        return view('indicacoes.index');
    }

    /**
     * preenche e salva a indicacao
     * @param $input
     */
    public function preencherSalvarIndicacao($input)
    {
        $indicacao = new Indicacao();
        $indicacao->descricao = $input['descricao'];
        $indicacao->situacao = SituacaoIndicacao::ANALISE;
        Auth::user()->indicacoes()->create($indicacao);
//        $indicacao->save();
        $input['indicacao_id'] = $indicacao->id;

        return $input;
    }
}