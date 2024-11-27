<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Gerador de Links de WhatsApp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;600&display=swap">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1 class="main-title">Gerador de Link de WhatsApp</h1>
<p class="sub-title">Comece uma conversa no WhatsApp com apenas um clique! Informe seu número e uma mensagem de boas-vindas para criar seu link exclusivo. Perfeito para empresas e interações pessoais!</p>
    <div class="container">
        <div class="form-group">
            <label for="whatsapp-number">Número de WhatsApp</label>
            <input type="text" id="whatsapp-number" placeholder="Ex: (83) 98888-8888">
        </div>
        <div class="form-group">
            <label for="message">Sua mensagem</label>
            <textarea id="message" rows="5" placeholder="Digite sua mensagem que gostaria de iniciar a conversa no Whatsapp."></textarea>
        </div>
        <button id="generate-link">Gerar link de WhatsApp</button>
        <div class="result">
            <label for="generated-link">✨ Link gerado</label>
            <div class="generated-link-container">
                <input type="text" id="generated-link" value="" readonly>
                <button id="copy-link">Copiar</button>
            </div>
        </div>
    </div>

    <!-- Banner do HostGator, agora logo após o container -->
    <a href="https://www.hostgator.com.br/49574-77-1-841.html" target="_blank" rel="nofollow">
        <img style="border:0px" src="https://latam-files.hostgator.com/br/afiliados/hospedagem/970x250.png" width="700" height="180" alt="Banner do HostGator">
    </a>

    <footer>
        <p>Visite o nosso site <a href="https://www.randson.com.br" target="_blank">www.randson.com.br</a></p>
    </footer>

    <script src="js/script.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var phoneInput = document.getElementById('whatsapp-number');

            phoneInput.addEventListener('input', function() {
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
        });

        document.getElementById('generate-link').addEventListener('click', function() {
            var number = document.getElementById('whatsapp-number').value;
            var cleanNumber = number.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
            var message = document.getElementById('message').value;
            var link = 'https://wa.me?phone=' + encodeURIComponent(cleanNumber) + '&text=' + encodeURIComponent(message);
            document.getElementById('generated-link').value = link;
        });

        document.getElementById('copy-link').addEventListener('click', function() {
            var linkInput = document.getElementById('generated-link');
            linkInput.select();
            document.execCommand('copy');
        });
    </script>

</body>
</html>
