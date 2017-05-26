@extends('layouts.app')

@section('content')

    <h1 class="text-center">Indicação</h1>
    <hr/>

    {{ Form::open(['url'=>'indicacoes', 'class' => 'form-horizontal col-sm-10']) }}

    @include('indicacoes.form')

    {{ Form::close() }}

    @include('errors.list')
@stop