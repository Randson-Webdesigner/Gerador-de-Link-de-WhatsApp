<?php
// Conexão com o banco de dados
$servername = "localhost"; // ou o seu servidor de banco de dados
$username = "root"; // seu usuário do MySQL
$password = ""; // sua senha do MySQL
$dbname = "visitas"; // o nome do seu banco de dados

$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica se a conexão foi bem-sucedida
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Atualiza o contador de visitas
$sql = "UPDATE contador_visitas SET visitas = visitas + 1 WHERE id = 1";
$conn->query($sql);

// Obtém o número atual de visitas
$sql = "SELECT visitas FROM contador_visitas WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$contador = $row['visitas'];

// Fecha a conexão
$conn->close();
?>
