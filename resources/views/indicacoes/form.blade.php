<div class="form-group">
    {{ Form::label('nome_empresa', 'Empresa', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('nome_empresa', null, ['class' =>'form-control']) }}
    </div>
    {{ Form::label('ramo_empresa', 'Ramo', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('ramo_empresa', null, ['class' =>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('nome_contato', 'Nome contato', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('nome_contato', null, ['class' =>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('cargo_contato', 'Cargo contato', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('cargo_contato', null, ['class' =>'form-control']) }}
    </div>
    {{ Form::label('cnpj', 'CNPJ', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('cnpj', null, ['class' =>'form-control']) }}
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
    {{ Form::label('email', 'Email', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('email', null, ['class' =>'form-control']) }}
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
    {{ Form::label('quantidade_alunos', 'Qtd alunos', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('quantidade_alunos', null, ['class' =>'form-control']) }}
    </div>
    {{ Form::label('quantidade_unidades', 'Qtd unidades', ['class' => 'col-sm-2 control-label']) }}
    <div class="col-sm-3">
        {{ Form::text('quantidade_unidades', null, ['class' =>'form-control']) }}
    </div>
</div>
<hr/>
<div class="form-group">
    {{ Form::label('descricao', 'Descrição', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        {{ Form::text('descricao', null, ['class' =>'form-control']) }}
    </div>
    {{ Form::label('situacao', 'Situação', ['class' => 'col-sm-1 control-label']) }}
    <div class="col-sm-4">
        @if(Auth::User()->is_admin)
            {{ Form::select('situacao', $situacoes , $indicacao->nome_situacao, ['class' =>'form-control']) }}
            {{ Form::input('hidden', 'situacao_anterior', $indicacao->nome_situacao , null, ['class' =>'form-control']) }}
            {{ Form::input('hidden', 'situacao_atual', $indicacao->situacao , null, ['class' =>'form-control']) }}
        @else
{{--            <p>{{ $indicacao->situacao }}</p>--}}
        @endif
    </div>
</div>

<div class="row center-block">
    {{ Form::submit('Salvar',['class' =>'btn btn-primary center-block']) }}
</div>