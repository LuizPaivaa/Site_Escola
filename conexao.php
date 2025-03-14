<?php
$servidor = "localhost";       // Endereço do servidor de banco de dados
$usuario = "root";             // Nome de usuário do banco de dados
$senha = "";                   // Senha do banco de dados
$banco = "tcc_ctma";      // Nome do banco de dados

// Cria a conexão
$conn = new mysqli($servidor, $usuario, $senha, $banco);

// Verifica a conexão
if ($conn->connect_errno) {
    echo "Falha ao conectar: (" .$conn->connect_errno . ")" .$conn->connect_errno;
}

// Define o charset para evitar problemas com acentuação
$conn->set_charset("utf8");

return $conn;

?>