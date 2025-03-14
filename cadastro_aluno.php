<?php
session_start();
require 'conexao.php';

$mensagem = "";

// Verifica se o formulário foi submetido
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT);
    $tipo = 'aluno'; // Define o tipo fixo como 'aluno'
    $curso_id = $_POST['curso_id'];
    $modulo_id = $_POST['modulo_id'];

    // Insere o aluno no banco de dados, incluindo curso_id e modulo_id
    $sql = "INSERT INTO usuarios (nome, email, senha, tipo, curso_id, modulo_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssii", $nome, $email, $senha, $tipo, $curso_id, $modulo_id);

    if ($stmt->execute()) {
        $mensagem = "Cadastro realizado com sucesso!";
    } else {
        $mensagem = "Erro ao realizar o cadastro: " . $conn->error;
    }

    $stmt->close();
}

// Consulta para carregar os cursos e módulos do banco de dados
$cursos = $conn->query("SELECT id, nome FROM cursos");
$modulos = $conn->query("SELECT id, numero FROM modulos");

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Cadastro de Aluno</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

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

        .voltar {
            position: absolute;
            top: 10px;
            left: 10px;
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

        .container {
            background-color: #f0f8ff;
            padding: 2rem;
            width: 100%;
            max-width: 400px;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            text-align: center;
        }

        .logo {
            margin-bottom: 1rem;
        }

        h2 {
            font-size: 22px;
            color: #003366;
            margin-bottom: 0.5rem;
        }

        p {
            font-size: 14px;
            color: #666;
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            text-align: left;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"],
        select {
            width: 100%;
            padding: 0.8rem;
            margin-bottom: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: #333;
        }

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

        .links {
            margin-top: 1rem;
            display: flex;
            justify-content: center;
        }

        .links a {
            color: #003366;
            font-size: 12px;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        footer {
            margin-top: 1.5rem;
            font-size: 12px;
            color: #666;
        }

    </style>
</head>

<body>
    <a href="index.php" class="voltar">&lt; Voltar à tela inicial</a>
    <div class="container">
        <div class="logo">
            <img src="img/LOGO_DO_CTMA.png" alt="Logotipo" width="120">
        </div>

        <h2>Cadastro de Aluno</h2>
        <p>Preencha as informações para se cadastrar.</p>

        <!-- Exibe mensagem de sucesso ou erro -->
        <?php if ($mensagem): ?>
        <p><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="cadastro_aluno.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" required>

            <label for="email">Email:</label>
            <input type="email" name="email" required>

            <label for="senha">Senha:</label>
            <input type="password" name="senha" required>

            <label for="curso_id">Curso:</label>
            <select name="curso_id" required>
                <option value="">Selecione o curso</option>
                <?php while ($curso = $cursos->fetch_assoc()): ?>
                <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="modulo_id">Módulo:</label>
            <select name="modulo_id" required>
                <option value="">Selecione o módulo</option>
                <?php while ($modulo = $modulos->fetch_assoc()): ?>
                <option value="<?php echo $modulo['id']; ?>">Módulo <?php echo $modulo['numero']; ?></option>
                <?php endwhile; ?>
            </select>

            <button type="submit">Cadastrar</button>

            <div class="links">
            <a href="login.php">Já possui conta? Faça login aqui ></a>
            </div>

        </form>

        <footer>
            <p>Copyright © 2024 Colégio. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>

</html>
