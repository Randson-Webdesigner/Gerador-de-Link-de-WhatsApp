document.addEventListener('DOMContentLoaded', function () {
    var phoneInput = document.getElementById('whatsapp-number');

    // Formatação ao digitar no campo de número do WhatsApp
    phoneInput.addEventListener('input', function () {
        var value = phoneInput.value.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

        if (value.length <= 2) {
            phoneInput.value = '(' + value;
        } else if (value.length <= 7) {
            phoneInput.value = '(' + value.slice(0, 2) + ') ' + value.slice(2);
        } else if (value.length <= 11) {
            phoneInput.value = '(' + value.slice(0, 2) + ') ' + value.slice(2, 7) + '-' + value.slice(7);
        } else {
            phoneInput.value = '(' + value.slice(0, 2) + ') ' + value.slice(2, 7) + '-' + value.slice(7, 11);
        }
    });

    // Gerar link do WhatsApp ao clicar no botão
    document.getElementById('generate-link').addEventListener('click', function () {
        var number = phoneInput.value;
        var cleanNumber = number.replace(/\D/g, ''); // Remove todos os caracteres não numéricos

        // Verifica se o número tem o tamanho mínimo necessário
        if (cleanNumber.length < 10 || cleanNumber.length > 11) {
            alert('Por favor, insira um número de telefone válido com DDD.');
            return;
        }

        var message = document.getElementById('message').value;
        var link = 'https://wa.me/+55' + encodeURIComponent(cleanNumber) + '?text=' + encodeURIComponent(message);

        document.getElementById('generated-link').value = link;
    });

    // Copiar link gerado para a área de transferência
    document.getElementById('copy-link').addEventListener('click', function () {
        var linkInput = document.getElementById('generated-link');

        if (!linkInput.value) {
            alert('Nenhum link gerado para copiar.');
            return;
        }

        linkInput.select();
        document.execCommand('copy');
        alert('Link copiado para a área de transferência!');
    });
});
