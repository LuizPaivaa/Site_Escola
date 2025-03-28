<?php
session_start();
require 'conexao.php';

$erro = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Consulta para alunos e professores, excluindo administradores
    $sql = "SELECT id, nome, senha, tipo FROM usuarios WHERE email = ? AND tipo IN ('aluno', 'professor')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Verifica se a senha está correta
        if (password_verify($senha, $user['senha'])) {
            // Armazena informações na sessão
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_nome'] = $user['nome'];
            $_SESSION['user_tipo'] = $user['tipo'];

            header("Location: index.php"); // Redireciona para a dashboard de alunos/professores
            exit;
        } else {
            $erro = "Senha incorreta.";
        }
    } else {
        $erro = "Email não encontrado ou não é um aluno/professor.";
    }

    $stmt->close();
    $conn->close();
}
?>

 <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Área Restrita</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

        /* Estilo do logotipo */
        .logo {
            margin-bottom: 1rem;
        }

        /* Título principal */
        h2 {
            font-size: 22px;
            color: #003366;
            margin-bottom: 0.5rem;
        }

        /* Subtítulo */
        p {
            font-size: 14px;
            color: #666;
            margin-bottom: 1.5rem;
        }

        /* Campos de entrada */
        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #333;
            text-align: left;
            font-weight: bold;
        }

        input[type="text"],
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

        /* Links para "Esqueceu a senha" e "Como acessar" */
        .links {
            margin-top: 1rem;
            display: flex;
            justify-content: space-between;
        }

        .links a {
            color: #003366;
            font-size: 12px;
            text-decoration: none;
        }

        .links a:hover {
            text-decoration: underline;
        }

        /* Rodapé */
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
            <img src="img/LOGO_DO_CTMA.png" alt="Logotipo" width="120"> <!-- Substitua por seu logotipo -->
        </div>

        <h2>Área restrita do Colégio</h2>
        <p>Estudante e educador.</p>
         <!-- Exibe mensagem de sucesso ou erro -->
   <?php if ($erro): ?>
        <p><?php echo $erro; ?></p>
        <?php endif; ?>
        <form action="ResetSenha.php" method="POST">
            <label for="RA">RA (Registro do Aluno)</label>
            <input type="text" id="RA" name="email" required>

            <label for="identificacao">Email</label>
            <input type="text" id="identificacao" name="email" required>

            <label for="senha">Nova Senha</label>
            <input type="password" id="senha" name="senha" required>

            <label for="senha">Repetir Nova Senha</label>
            <input type="password" id="senha" name="senha" required>

            <button type="submit">Resetar senha</button>
        </form>

        <footer>
            <p>Copyright © 2024 Colégio. Todos os direitos reservados.</p>
        </footer>
    </div>
</body>

</html>


