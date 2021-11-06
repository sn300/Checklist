window.onload = function() {
    $('.editar').on('click', function() {
        $('#editar').modal('show');
        var nomea = document.getElementById('nome_a');
        var nomee = document.getElementById('nome_e');
        var emaila = document.getElementById('email_a');
        var emaile = document.getElementById('email_e');
        var cpfa = document.getElementById('cpf_a');
        var cpfe = document.getElementById('cpf_e');
        var senhaa = document.getElementById('senha_a');
        var senhae = document.getElementById('senha_e');
        var contatoa = document.getElementById('contato_a');
        var contatoe = document.getElementById('contato_e');
        var fotoa = document.getElementById('foto_a');
        var fotoe = document.getElementById('foto_e');
        nomee.value = nomea.value;
        emaile.value = emaila.value;
        cpfe.value = cpfa.value;
        senhae.value = senhaa.value;
        contatoe.value = contatoa.value;
        fotoe.value = fotoa.value;

    });
};