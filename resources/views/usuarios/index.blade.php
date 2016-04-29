@extends('layouts.app')

@section('content')
    <link href="{{  url('assets/css/reset.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{  url('assets/css/style.css') }}" rel='stylesheet' type='text/css'>
    <script src="{{  url('assets/js/modernizr.js') }}"></script>
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,600,700' rel='stylesheet'
          type='text/css'>
    <style>
        .user-painel {
            border-radius: 6px;
            box-shadow: 2px 11px 10px 5px #888888;
            padding-left: 0;
            padding-right: 0;
            color: dimgray;
        }

        .user-painel img {
            width: 75%;
            margin: 0 auto;
        }

        .user-stat {
            background-color: #f6f6f6;
            border-top: 1px solid #e7e7e7;
            padding: 6px;
        }

        .user-stat span {
            margin-left: 15px;
            margin-right: 15px;
        }

        .user-info {
            padding: 3px;
            margin-left: 15px;
            overflow: hidden;
        }

        .profile-img-container {
            position: relative;
            /*display: inline-block; *//* added */
            overflow: hidden; /* added */
        }

        .profile-img-container img {
            opacity: 1;
            /*width:100%;*/
        }

        /* remove if using in grid system */

        .profile-img-container img:hover {
            opacity: 0.1
        }

        .profile-img-container:hover a {
            opacity: 1; /* added */
            top: 0; /* added */
            z-index: 500;
        }

        .profile-img-container:hover a span {
            top: 50%;
            position: absolute;
            left: 0;
            right: 0;
            transform: translateY(-50%);
        }

        /* added */
        .profile-img-container a {
            display: block;
            position: absolute;
            top: -100%;
            opacity: 0;
            left: 0;
            bottom: 0;
            right: 0;
            text-align: center;
            color: inherit;
        }

        .modal-footer {
            border-top: none;
        }

        .border-top {
            border-top: 1px solid #e5e5e5;
        }

        .modal-body p {
            padding: 10px 0 5px 0;
            font-size: 90%;
            font-weight: bold;
        }
    </style>
    <h1 class="text-center">Usuários</h1>

    @foreach($users as $user)
        <div class="col-xs-offset-1 col-xs-10 col-md-2 user-painel">
            <div class="profile-img-container">
                <img src="{{  url('assets/img/289046.jpg') }}" class="img-responsive img-circle"
                     alt="Responsive image">

                <a><span class="fa fa-plus fa-5x" id="usuarioModalAnchor" data-usuario="" data-toggle="modal"
                         data-path="{{ url('api/users', $user->id)  }}"></span></a>
            </div>
            <p class="user-info"><i class="fa fa-user" aria-hidden="true"></i> {{ $user->name }}</p>

            <p class="user-info"><i class="fa fa-map-marker" aria-hidden="true"></i> {{ $user->cidade }} {{ $user->UF }}
            </p>

            <p class="user-info"><i class="fa fa-registered"
                                    aria-hidden="true"></i> {{ $user->created_at->format('d/m/y') }}</p>

            <p class="user-info" style="white-space: nowrap"><i class="fa fa-envelope" aria-hidden="true"></i><a
                        href="mailto:{{ $user->email}}"> {{ $user->email}} </a></p>

            <div class="user-stat">
                <span><i class="fa fa-dollar" aria-hidden="true"
                         title="Indicações realizadas"> </i>{{$user->indicacoes()->count()}}</span>
                <span><i class="fa fa-money"
                         title="Indicações com venda"></i> {{$user->indicacoes()->where('situacao','DEPOSITADO')->count()}}</span>
            </div>
        </div>
    @endforeach
    <div class="modal fade" id="usuarioModal" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="col-md-3">
                            Informações Gerais
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <p>Empresa</p>
                                <label class="control-lable" id="nome_empresa"></label>
                            </div>
                            <div class="col-md-4 col-md-offset-4">
                                <p>Ramo</p>
                                <label class="control-lable" id="ramo_empresa"></label>
                            </div>
                            <div class="col-md-8">
                                <p>Email</p>
                                <label class="control-lable" id="email"></label>
                            </div>
                            <div class="col-md-2">
                                <p>Telefone</p>
                                <label class="control-lable" id="telefone"></label>
                            </div>
                            <div class="col-md-2">
                                <p>Tel de contato</p>
                                <label class="control-lable" id="telefone_contato"></label>
                            </div>
                            <div class="col-md-8">
                                <p>Endereço</p>
                                <label class="control-lable" id="endereco"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Bairro</p>
                                <label class="control-lable" id="bairro"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Cep</p>
                                <label class="control-lable" id="cep"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Cidade</p>
                                <label class="control-lable" id="cidade"></label>
                            </div>
                            <div class="col-md-4">
                                <p>UF</p>
                                <label class="control-lable" id="UF"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 border-top">
                        <div class="col-md-3">
                            Informações Bancárias
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <p>CPF</p>
                                <label class="control-lable" id="cpf"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Banco</p>
                                <label class="control-lable" id="banco"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Agência</p>
                                <label class="control-lable" id="agencia"></label>
                            </div>
                            <div class="col-md-4">
                                <p>Conta</p>
                                <label class="control-lable" id="conta"></label>
                            </div>
                            <div class="col-md-4">
                                <p>OP</p>
                                <label class="control-lable" id="operacao"></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 border-top">
                        <div class="col-md-3">
                            Controle
                        </div>
                        <div class="col-md-9">
                            <div class="col-md-4">
                                <p>Desabilitar usuário
                                    <input name="habilitado" type="checkbox"/>
                                </p>
                            </div>
                            <div class="col-md-4">
                                <p>Administrador
                                    <input name="habilitado" type="checkbox"/>
                                </p>
                            </div>
                        </div>
                        <div class="col-md-offset-3 col-md-9">
                            <p>Observação<small>(Visível apenas para administrador)</small></p>
                            <textarea name="observacao" id="observacao" style="width: 90%" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Salvar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- /.modal -->

@endsection