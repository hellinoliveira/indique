@extends('layouts.app')

@section('content')

    <h1 class="text-center">Meu perfil</h1>
    <hr/>
    {{ Form::model($user, array('method'=> 'PATCH', 'url' => array('perfil', $user->id), 'class' => 'form-horizontal col-sm-10'))}}

    <div class="form-group">
        {{ Form::label('name', 'Nome', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('name', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('email', 'Email', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('email', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('empresa', 'Empresa', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('empresa', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('cargo', 'Cargo', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('cargo', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('endereco', 'Endereço', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('endereco', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('bairro', 'Bairro', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('bairro', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('cep', 'Cep', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-2">
            {{ Form::text('cep', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('cidade', 'Cidade', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('cidade', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('UF', 'UF', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-1">
            {{ Form::text('UF', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('telefone', 'Telefone', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('telefone', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('telefone_contato', 'Tel contato', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-3">
            {{ Form::text('telefone_contato', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('banco', 'Banco', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-3">
            {{ Form::select('banco', array('104' => 'Caixa Economica Federal', '1' => 'Banco do Brasil'), null, ['class' =>'form-control', 'placeholder' => 'Selecione o banco']) }}
        </div>
        {{ Form::label('agencia', 'Agência', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-2">
            {{ Form::text('agencia', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('conta', 'Conta', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-2">
            {{ Form::text('conta', null, ['class' =>'form-control']) }}
        </div>
        <div class="col-sm-1">
            {{ Form::text('operacao', null, ['class' =>'form-control','placeholder' => 'OP']) }}
        </div>
    </div>

    <div class="form-group">
        {{ Form::label('nome_titular_conta', 'Titular', ['class' => 'col-sm-1 control-label']) }}
        <div class="col-sm-4">
            {{ Form::text('nome_titular_conta', null, ['class' =>'form-control']) }}
        </div>
        {{ Form::label('cpf_titular_conta', 'CPF titular', ['class' => 'col-sm-2 control-label']) }}
        <div class="col-sm-3">
            {{ Form::text('cpf_titular_conta', null, ['class' =>'form-control']) }}
        </div>
    </div>
    <hr/>
    <div class="row center-block">
        {{ Form::submit('Salvar',['class' =>'btn btn-primary center-block']) }}
    </div>
    {{ Form::close() }}
@stop