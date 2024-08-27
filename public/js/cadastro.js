document.getElementById('formAdd').addEventListener('submit', function(event) {
    event.preventDefault();

    var emailInput = document.getElementById('inputEmail').value;
    var errorMessageDiv = document.getElementById('error-message');
    var successMessageDiv = document.getElementById('success-message');
    var errorMessageP = errorMessageDiv.querySelector('p');
    var successMessageP = successMessageDiv.querySelector('p');
    
    if (validateEmail(emailInput)) {
        errorMessageP.textContent = ''; // Limpa a mensagem de erro
        errorMessageDiv.style.display = 'none'; // Oculta a div de mensagem de erro

        this.submit(); 

        // Exibir a mensagem de sucesso
        successMessageP.textContent = 'Formulário enviado com sucesso!';
        successMessageDiv.style.display = 'block';
    } else {
        errorMessageP.textContent = 'Email inválido. Por favor, insira um email válido.';
        errorMessageDiv.style.display = 'block'; 

        // Ocultar a mensagem de sucesso, se visível
        successMessageDiv.style.display = 'none';
    }
});

function validateEmail(email) {
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(email);
}
