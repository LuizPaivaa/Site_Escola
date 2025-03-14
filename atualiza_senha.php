<?php
require 'conexao.php';

// Defina o email do administrador e a nova senha
$email_admin = 'adm@adm';
$nova_senha = '@master71';

// Criptografa a nova senha
$senha_hash = password_hash($nova_senha, PASSWORD_BCRYPT);

// Atualiza a senha no banco de dados
$sql = "UPDATE usuarios SET senha = ? WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $senha_hash, $email_admin);

if ($stmt->execute()) {
    echo "Senha do administrador atualizada com sucesso!";
} else {
    echo "Erro ao atualizar a senha: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>