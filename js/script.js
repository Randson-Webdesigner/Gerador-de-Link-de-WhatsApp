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
