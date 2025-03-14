<?php
session_start();
require 'conexao.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para o administrador
    $sql = "SELECT id, nome, senha, tipo FROM usuarios WHERE email = ? AND tipo = 'admin'";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_tipo'] = $user['tipo'];

            header("Location: admin_dashboard.php"); // ajuste o caminho conforme necessário
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Email não encontrado ou não é um administrador.";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Login do Administrador</title>
    <style>
        /* Reset básico */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Fundo com padrão azul */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #003366;
            font-family: Arial, sans-serif;
            color: #333;
            position: relative;
        }

        /* Link para voltar */
        .voltar {
            position: absolute;
            top: 10px;
            right: 10px;
            color: #ffffff;
            font-size: 14px;
            text-decoration: none;
            font-weight: bold;
            opacity: 0.8;
            transition: opacity 0.3s;
        }

        .voltar:hover {
            opacity: 1;
            text-decoration: underline;
        }

        /* Contêiner central */
        .container {
            background-color: #f0f8ff;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        /* Título principal */
        h2 {
            font-size: 22px;
            color: #003366;
            margin-bottom: 0.5rem;
        }

        /* Mensagem de erro */
        .erro {
            color: red;
            font-size: 14px;
            margin-bottom: 1rem;
        }

        /* Campos de entrada */
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            text-align: left;
            font-weight: bold;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

        /* Botão de login */
        button[type="submit"] {
            width: 100%;
            padding: 0.8rem;
            background-color: #003366;
            border: none;
            border-radius: 5px;
            color: #fff;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button[type="submit"]:hover {
            background-color: #00509e;
        }
    </style>
</head>

<body>

    <!-- Link para voltar à tela inicial -->
    <a href="index.php" class="voltar">&lt; Voltar à tela inicial</a>

    <div class="container">
        <h2>Login do Administrador</h2>

        <?php if ($erro): ?>
            <p class="erro"><?php echo $erro; ?></p>
        <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <button type="submit">Entrar</button>
        </form>
    </div>

</body>

</html>
