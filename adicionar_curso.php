<?php
session_start();
require 'conexao.php';

// Verifica se o usuário é administrador
if ($_SESSION['user_tipo'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$mensagem = ''; // Variável para armazenar mensagens

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];

    $stmt = $conn->prepare("INSERT INTO cursos (nome) VALUES (?)");
    $stmt->bind_param("s", $nome);
    
    if ($stmt->execute()) {
        $mensagem = "Curso adicionado com sucesso!";
    } else {
        $mensagem = "Erro ao adicionar curso. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Curso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset básico e estilo geral */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            padding: 0;
            margin: 0;
            height: 100vh;
        }

        /* Navbar */
        nav {
            background-color: #333;
            padding: 10px 20px;
            color: #fff;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-size: 16px;
            margin-right: 15px;
        }

        nav a:hover {
            text-decoration: underline;
        }

        /* Conteúdo */
        .container {
            max-width: 800px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1,
        h2 {
            color: #003366;
            font-size: 28px;
            margin-bottom: 20px;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        /* Formulário */
        form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        label {
            font-size: 16px;
            color: #333;
        }

        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
            margin-top: 8px;
        }

        input:focus {
            border-color: #007BFF;
        }

        button {
            padding: 12px 20px;
            font-size: 16px;
            color: #fff;
            background-color: #007BFF;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Mensagens */
        .mensagem {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            font-weight: bold;
        }

        .mensagem-sucesso {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }

        .mensagem-erro {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
        }

        /* Responsividade */
        @media (max-width: 768px) {
            .container {
                padding: 15px;
            }
        }

        /* Footer */
        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            margin-top: 40px;
        }
    </style>
</head>

<body>
    <?php include_once "header.php"; ?>

    <div class="container">
        <h2>Adicionar Curso</h2>

        <!-- Mensagem de feedback -->
        <?php if ($mensagem): ?>
            <div class="mensagem <?php echo strpos($mensagem, 'sucesso') !== false ? 'mensagem-sucesso' : 'mensagem-erro'; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="adicionar_curso.php">
            <label for="nome">Nome do Curso:</label>
            <input type="text" name="nome" required>

            <button type="submit">Adicionar Curso</button>
            <button onclick="window.history.back()" class="voltar-button">Voltar</button>
        </form>
    </div>

    <?php include_once "footer.php"; ?>
</body>

</html>
