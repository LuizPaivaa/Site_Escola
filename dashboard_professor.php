<?php
session_start();

// Verifica se o usuário é professor
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'professor') {
    header("Location: login.php");
    exit;
}

// Obtém as informações do professor logado
$professor_nome = htmlspecialchars($_SESSION['user_nome']);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Dashboard do Professor</title>
    <style>
    /* Estilo para o layout completo */
    html, body {
        height: 100%;
        margin: 0;
        font-family: Arial, sans-serif;
        display: flex;
        flex-direction: column;
    }

    body {
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        flex: 1; /* Faz o conteúdo ocupar o espaço restante */
    }

    h1 {
        color: #333;
    }

    h2 {
        color: #333;
    }

    .link-button {
        display: inline-block;
        margin: 10px 0;
        padding: 10px 20px;
        background-color: #007BFF;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
    }

    .link-button:hover {
        background-color: #0056b3;
    }

    /* Estilo para o footer */
    footer {
        background-color: #333;
        color: white;
        padding: 10px 0;
        text-align: center;
        margin-top: auto; /* Garante que o footer vai para o final da página */
    }
    </style>
</head>

<body>
    <?php include_once "header.php" ?>

    <div class="container">
        <h1>Dashboard do Professor</h1>
        <p>Bem-vindo, <?php echo $professor_nome; ?>!</p>

        <h2>Gerenciamento de Boletins</h2>
        <a href="inserir_boletim.php" class="link-button">Cadastrar Boletim</a>
        <a href="visualizar_editar_boletins.php" class="link-button">Visualizar Boletins</a>

        <h2>Alunos e Cursos</h2>
        <a href="visualizar_alunos_por_curso.php" class="link-button">Visualizar Alunos e Cursos</a>
        <a href="logout.php" class="link-button" style="background-color: #dc3545;">SAIR</a> <!-- botão para logout -->
    </div>

    <?php include_once "footer.php" ?>
</body>

</html>
