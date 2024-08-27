let idParticipanteExcluir = null;

function msgConfirm(button) {
    idParticipanteExcluir = button.getAttribute('data-id');
    document.getElementById('confirm-excluir').style.display = 'flex';
}

function negarMsg() {
    document.getElementById('confirm-excluir').style.display = 'none';
}

function test() {
    if (idParticipanteExcluir !== null) {
        console.log('Enviando requisição para excluir o participante com ID:', idParticipanteExcluir);
        fetch(`/participantes/${idParticipanteExcluir}?confirmar=true`, {
            method: 'DELETE',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Erro na resposta da requisição');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Erro ao excluir o participante.');
            }
        })
        .catch(error => {
            console.error('Erro:', error);
            alert('Erro ao excluir o participante.');
        });
    }
    document.getElementById('confirm-excluir').style.display = 'none';
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
    // Limpa os campos de filtro
    document.getElementById('nome').value = '';
    document.getElementById('email').value = '';
    
    document.getElementById('formFiltro').submit();
}




