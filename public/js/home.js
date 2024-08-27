function msgConfirm () {
    window.document.getElementById('confirm-excluir').style.display='flex'
}

function negarMsg () {
    window.document.getElementById('confirm-excluir').style.display='none'
}

function MostrarFiltro () {
    //desaparece
    window.document.getElementById('partici').style.display='none'
    window.document.getElementById('BtnsTopo').style.display='none'
    window.document.getElementById('confirm-excluir').style.display='none'
    window.document.getElementById('Container').style.display='none'
    //aparece
    window.document.getElementById('Filtro').style.display='flex'
    window.document.getElementById('Filtroh1').style.display='flex'
}

function limparFiltro() {
    // Limpar os campos de filtro
    document.getElementById('nome').value = '';
    document.getElementById('email').value = '';

    // Submeter o formulário com os campos vazios
    document.getElementById('formFiltro').submit();
}


