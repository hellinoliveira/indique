@extends('layouts.app')

@section('content')
    <link href="{{  url('assets/css/reset.css') }}" rel='stylesheet' type='text/css'>
    <link href="{{  url('assets/css/style.css') }}" rel='stylesheet' type='text/css'>
    <h1 class="text-center">Minhas indicacões</h1>
    <hr/>
    @foreach( $indicacoes as $indicacao )
        {{--<article>--}}
        <a href="{{ action('IndicacoesController@edit', $indicacao->id) }}">{{ $indicacao->nome_empresa }}</a>
        <!-- STEPS -->
        <section class="cd-horizontal-timeline">
            <div class="timeline">
                <div class="events-wrapper">
                    <div class="events">
                        <ol>
                            <li><a href="#0" data-date="{{ $indicacao->created_at->format('d/m/Y') }}"
                                   class="selected">{{ $indicacao->created_at->format('d/m/y') }}</a></li>
                            @foreach( $indicacoes as $indicacao )<!-- movimentacoes cria os indices e depois os textos -->
                                <li><a href="#0" data-date="{{ $indicacao->created_at->format('d/m/Y') }}">
                                        {{ $indicacao->created_at->format('d/m/y') }}</a></li>
                            @endforeach
                        </ol>

                        <span class="filling-line" aria-hidden="true"></span>
                    </div>
                    <!-- .events -->
                </div>
                <!-- .events-wrapper -->

                <ul class="cd-timeline-navigation">
                    <li><a href="#0" class="prev inactive">Prev</a></li>
                    <li><a href="#0" class="next">Next</a></li>
                </ul>
                <!-- .cd-timeline-navigation -->
            </div>
            <!-- .timeline -->

            <div class="events-content">
                <ol>
                    <li class="selected" data-date="{{ $indicacao->created_at->format('d/m/Y') }}">
                        <h6>Indicação realizada</h6>

                        <p>
                            O primeiro passo foi dado! Agora basta aguardar um dos nossos representantes entrar em
                            contato com a empresa indicacada.
                        </p>
                    </li>


                </ol>
            </div>
            <!-- .events-content -->
        </section>
        {{--</article>--}}
    @endforeach
    <a href="{{ url('indicacoes/create')}}"><i class="fa fa-plus"></i>Nova indicação</a>
    <script src="{{  url('assets/js/jquery-2.1.4.js') }}"></script>
    <script src="{{  url('assets/js/jquery.mobile.custom.js') }}"></script>
    <script src="{{  url('assets/js/main.js') }}"></script>
@endsection