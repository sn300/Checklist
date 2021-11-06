function apagar_ferramenta(id) {
    if (window.confirm('Deseja realmente apagar este registro?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=ferramenta&&id=' + id
    }
}

function apagar_funcionario(id) {
    if (window.confirm('Deseja realmente apagar este funcionário?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=funcionario&&id=' + id
    }
}

function apagar_epi(id) {
    if (window.confirm('Deseja realmente apagar este este Epi?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=epi&&id=' + id
    }
}

function apagar_peca(id) {
    if (window.confirm('Deseja realmente apagar esta peça?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=pecas&&id=' + id
    }
}

function apagar_auto(id) {
    if (window.confirm('Deseja realmente apagar este Automóvel?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=auto&&id=' + id
    }
}

function apagar_epc(id) {
    if (window.confirm('Deseja realmente apagar este Epc?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=epc&&id=' + id
    }
}

function apagar_relatorio_moto(id) {
    if (window.confirm('Deseja realmente apagar este relatorio?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=relatorio_moto&&id=' + id
    }
}

function apagar_relatorio_carro(id) {
    if (window.confirm('Deseja realmente apagar este relatorio?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=relatorio_carro&&id=' + id
    }
}

function apagar_relatorio_aux(id) {
    if (window.confirm('Deseja realmente apagar este relatorio?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=relatorio_aux&&id=' + id
    }
}

function apagar_relatorio_adm_aux(id) {
    if (window.confirm('Deseja realmente apagar este relatorio?')) {
        window.location.href = '../../../controle/deletar/deletar.php?tipo=relatorio_adm_aux&&id=' + id
    }
}