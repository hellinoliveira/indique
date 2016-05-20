@extends('layouts.app')

@section('content')

    <link href="{{  url('assets/css/usuario.css') }}" rel='stylesheet' type='text/css'>

    <h1 class="text-center">Usuários</h1>
    <div class="form-group col-sm-11 col-sm-offset-1">
        {{ Form::open(array('method'=> 'POST', 'url' => 'usuarios/filtro')) }}
        {{--<label class="col-sm-2 control-label">Filtrar usuários</label>--}}
        <div class="form-group col-sm-2">
            {{ Form::select('filtro', array('Ativos', 'Inativos','Administradores', 'Todos'), $selecionado , array('class' =>'form-control') )}}
        </div>
        {{--<label class="col-sm-2 control-label">Ordenar</label>--}}
        <div class="form-group  col-sm-2">
            {{ Form::select('ordem', array('Nome A-Z', 'Nome Z-A', 'Data de cadastro', 'Mais indicações', 'Menos indicações'), $ordenado , array('class' =>'form-control') )}}
        </div>
        <div class="col-sm-1" >
            {{ Form::submit('Filtrar',['class' =>'btn btn-primary center-block']) }}
        </div>
        {{ Form::close() }}
    </div>
    <br>
    @foreach($users as $user)
        <div class="col-xs-offset-1 col-xs-10 col-md-2 user-painel">
            <div class="profile-img-container">
                <img src="{{  url('assets/img/profile/', $user->photo) }}" class="img-responsive img-circle"
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
                            <p>Observação
                                <small>(Visível apenas para administrador)</small>
                            </p>
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