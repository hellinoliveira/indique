@extends('layouts.app')

@section('content')
    <style>
        .ANALISE {
            border-top: 3px solid orange;
        }

        .ANALISE .fa {
            color: orange;
        }

        .COMERCIAL {
            border-top: 3px solid #ffff00;
        }

        .COMERCIAL .fa {
            color: #ffff00;
        }

        .VENDIDO {
            border-top: 3px solid lightgreen;
        }

        .VENDIDO .fa {
            color: lightgreen;
        }

        .DEPOSITADO {
            border-top: 3px solid darkgreen;
        }

        .DEPOSITADO .fa {
            color: darkgreen;
        }

        .OBJECAO {
            border-top: 3px solid red;
        }

        .OBJECAO .fa {
            color: red;
        }

    </style>
    <link href="{{  url('assets/css/bootstrap.css') }}" rel="stylesheet"/>
    <link href="{{  url('assets/css/rotating-card.css') }}" rel="stylesheet"/>

    <h1 class="text-center">Indicações</h1>
    <hr/>
    @foreach( $indicacoes as $indicacao )
        <div class="col-md-3">
            <!-- STEPS -->
            <div class="card-container">
                <div class="card {{ $indicacao->cor_situacao }}">
                    <div class="front">
                        <div style="margin: 0 auto; font-size: 60px;"
                             class="text-center {{ $indicacao->nome_situacao }}">
                            <i class="fa {{ $indicacao->icon_situacao  }}" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h3 class="name">{{ $indicacao->nome_empresa }}</h3>

                                <p class="profession">{{ $indicacao->nome_contato }}</p>

                                <p class="text-center">Indicação realizada
                                    há {{$indicacao->created_at->diffForHumans()}} por {{$indicacao->user->name}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- end front panel -->
                    <div class="back">
                        <div class="header">
                            <h5 class="motto">{{ $indicacao->descricao }}</h5>
                        </div>
                        <div class="content">
                            <div class="main">
                                <h4 class="text-center">{{ $indicacao->situacao }}</h4>

                                <p class="text-center">{{ $indicacao->observacao }}</p>

                                <div class="stats-container">
                                    <div class="stats">
                                        <h4>{{ $indicacao->quantidade_alunos == null ? 0 :$indicacao->quantidade_alunos }}</h4>

                                        <p>
                                            Alunos
                                        </p>
                                    </div>
                                    <div class="stats">
                                        <h4>{{ $indicacao->quantidade_unidades == null ? 0 :$indicacao->quantidade_unidades  }}</h4>

                                        <p>
                                            Unidades
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="footer">
                            <div class="social-links text-center">
                                <a title="Editar indicação"
                                   href="{{ action('IndicacoesController@edit', $indicacao->id) }}" class="facebook"><i
                                            class="fa fa-edit fa-fw"></i></a>
                                <a title="Apagar indicação"
                                   href="{{ action('IndicacoesController@edit', $indicacao->id) }}" class="google"><i
                                            class="fa fa-trash fa-fw"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- end back panel -->
                </div>
                <!-- end card -->
            </div>
            <!-- end card-container -->

        </div>
    @endforeach
@endsection