@extends('layouts.app')

@section('content')
    <link href="{{  url('assets/css/indicacao.css') }}" rel='stylesheet' type='text/css'>
    
    <h1 class="text-center">Minhas indicacões</h1>
    <hr/>
    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
        @foreach( $indicacoes as $indicacao )
            {{--<article>--}}


            <div class="panel panel-default ">
                <div class="panel-heading" role="tab" id="headingOne">
                    <h4 class="panel-title">
                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$indicacao->id}}"
                           aria-expanded="true" aria-controls="collapse{{$indicacao->id}}">
                            {{ $indicacao->nome_empresa }}
                        </a>
                        <a href="{{ action('IndicacoesController@edit', $indicacao->id) }}">
                            <i class="fa fa-external-link"></i>
                        </a>
                    </h4>
                </div>
                <div id="collapse{{$indicacao->id}}" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                    <div class="panel-body">

                        <ul class="timeline" id="timeline">
                            <li class="li complete">
                                <div class="timestamp">
                                    <span class="author">Indicação realizada</span>
                                    <span class="date">{{ $indicacao->created_at->format('d/m/Y') }}</span>
                                </div>
                                <div class="status ANALISE">
                                    <p class="status-indicacao ANALISE "><i class="fa fa-clock-o"></i></p>
                                    <h4>Em análise</h4>
                                </div>
                            </li>
                            @foreach( $indicacao->movimentacoes as $movimentacao )
                                <li class="li complete">
                                    <div class="timestamp">
                                        <span class="author">{{ $movimentacao->situacao_atual }}</span>
                                        <span class="date">{{ $movimentacao->created_at->format('d/m/Y') }}</span>
                                    </div>
                                    <div class="status {{ $movimentacao->nome_situacao}}">
                                        <p class="status-indicacao {{ $movimentacao->nome_situacao}}"><i
                                                    class="fa {{ $movimentacao->icon_situacao  }}"></i></p>
                                        <h4>{{ $movimentacao->situacao_atual }}</h4>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                        </li>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <a href="{{ url('indicacoes/create')}}"><i class="fa fa-plus"></i>Nova indicação</a>
@endsection