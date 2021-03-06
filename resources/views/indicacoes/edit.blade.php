@extends('layouts.app')

@section('content')

    <h1 class="text-center">Indicação</h1>
    <hr/>

    {{ Form::model($indicacao, array('method'=> 'PATCH', 'action' => array('IndicacoesController@update', $indicacao->id), 'class' => 'form-horizontal col-sm-10'))}}

    @include('indicacoes.form')

    {{ Form::close() }}

    @include('errors.list')
@endsection