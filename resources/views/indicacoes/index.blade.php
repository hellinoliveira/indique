@extends('layouts.app')

@section('content')
    <h1 class="text-center">Minhas indicacões</h1>
    <hr/>
    @foreach( $indicacoes as $indicacao )
        <article>
            <a href="{{ url('indicacoes', $indicacao->id) }}">oi{{ $indicacao->nome }}</a>
        </article>
    @endforeach
    <a href="{{ url('indicacoes/create')}}"><i class="fa fa-plus"></i>Nova indicação</a>
@endsection