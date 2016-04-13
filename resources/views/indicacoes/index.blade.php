@extends('layouts.app')

@section('content')
    <style>
        @import url(http://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic);
        html {
            box-sizing: border-box;
        }

        *, *:before, *:after {
            box-sizing: inherit;
        }

        body {
            font-family: lato;
        }

        .section-header, .steps-header, .steps-name {
            color: #3498DB;
            font-weight: 400;
            font-size: 1.4em;
        }

        .steps-header {
            margin-bottom: 20px;
            text-align: center;
        }

        .steps-timeline {
            outline: 1px dashed rgba(255, 0, 0, 0);
        }
        @media screen and (max-width: 500px) {
            .steps-timeline {
                border-left: 2px solid #3498DB;
                margin-left: 25px;
            }
        }
        @media screen and (min-width: 500px) {
            .steps-timeline {
                border-top: 2px solid #3498DB;
                padding-top: 20px;
                margin-top: 40px;
                margin-left: 16.65%;
                margin-right: 16.65%;
            }
        }
        .steps-timeline:after {
            content: "";
            display: table;
            clear: both;
        }

        .steps-one,
        .steps-two,
        .steps-three {
            outline: 1px dashed rgba(0, 128, 0, 0);
        }
        @media screen and (max-width: 500px) {
            .steps-one,
            .steps-two,
            .steps-three {
                margin-left: -25px;
            }
        }
        @media screen and (min-width: 500px) {
            .steps-one,
            .steps-two,
            .steps-three {
                float: left;
                width: 33%;
                margin-top: -50px;
            }
        }

        @media screen and (max-width: 500px) {
            .steps-one,
            .steps-two {
                padding-bottom: 40px;
            }
        }

        @media screen and (min-width: 500px) {
            .steps-one {
                margin-left: -16.65%;
                margin-right: 16.65%;
            }
        }

        @media screen and (max-width: 500px) {
            .steps-three {
                margin-bottom: -100%;
            }
        }
        @media screen and (min-width: 500px) {
            .steps-three {
                margin-left: 16.65%;
                margin-right: -16.65%;
            }
        }

        .steps-img {
            display: block;
            margin: auto;
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
        @media screen and (max-width: 500px) {
            .steps-img {
                float: left;
                margin-right: 20px;
            }
        }

        .steps-name,
        .steps-description {
            margin: 0;
        }

        @media screen and (min-width: 500px) {
            .steps-name {
                text-align: center;
            }
        }

        .steps-description {
            overflow: hidden;
        }
        @media screen and (min-width: 500px) {
            .steps-description {
                text-align: center;
            }
        }

    </style>
    <h1 class="text-center">Minhas indicacões</h1>
    <hr/>
    @foreach( $indicacoes as $indicacao )
        <article>
            <a href="{{ action('IndicacoesController@edit', $indicacao->id) }}">{{ $indicacao->nome_empresa }}</a>
            <!-- STEPS -->
            <section id="Steps" class="steps-section">

                <h2 class="steps-header">
                    <a href="{{ action('IndicacoesController@edit', $indicacao->id) }}">{{ $indicacao->nome_empresa }}</a>
                    {{--<a href="{{ url('indicacoes', $indicacao->id) }}">{{ $indicacao->descricao }}</a>--}}
                </h2>

                <div class="steps-timeline">

                    <div class="steps-one">
                        <img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
                        <h3 class="steps-name">
{{--                            {{ $indicacao->created_at ->diffForHumans() }}--}}
                            {{ $indicacao->created_at }}
                        </h3>
                        <p class="steps-description">
                            The timeline is created using negative margins and a top border.
                        </p>
                    </div>

                    <div class="steps-two">
                        <img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
                        <h3 class="steps-name">
                            Relative
                        </h3>
                        <p class="steps-description">
                            All elements are positioned realtive to the parent. No absolute positioning.
                        </p>
                    </div>

                    <div class="steps-three">
                        <img class="steps-img" src="http://placehold.it/50/3498DB/FFFFFF" alt="" />
                        <h3 class="steps-name">
                            Contained
                        </h3>
                        <p class="steps-description">
                            The timeline does not extend past the first and last elements.
                        </p>
                    </div>

                </div><!-- /.steps-timeline -->

            </section>
        </article>
    @endforeach
    <a href="{{ url('indicacoes/create')}}"><i class="fa fa-plus"></i>Nova indicação</a>
@endsection