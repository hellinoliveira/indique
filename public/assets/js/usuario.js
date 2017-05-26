$('.fa-plus').click(function () {
    $.ajax({
        type: 'GET',
        url: $(this).data('path'),

        success: function (result) {
            usuario = result;
            console.log(result)
            $('#usuarioModal').modal();

        }
    });
});

$('#usuarioModal').on('show.bs.modal', function () {
    var modal = $(this)
    modal.find('.modal-title').text('' + usuario.name)
    $('#nome').text(usuario.name)
    $('#nome_empresa').text(usuario.empresa)
    $('#ramo_empresa').text(usuario.cargo)
    $('#cpf').text(usuario.cpf_titular_conta)
    $('#endereco').text(usuario.endereco)
    $('#bairro').text(usuario.bairro)
    $('#cep').text(usuario.cep)
    $('#cidade').text(usuario.cidade)
    $('#UF').text(usuario.UF)
    $('#email').text(usuario.email)
    $('#telefone').text(usuario.telefone)
    $('#nome_titular_conta').text(usuario.nome_titular_conta)
    $('#operacao').text(usuario.operacao)
    $('#banco').text(usuario.banco)
    $('#agencia').text(usuario.agencia)
    $('#conta').text(usuario.conta)
});