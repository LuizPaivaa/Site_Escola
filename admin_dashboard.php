<?php
session_start();

// Verifica se o usuário é o administrador
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
    header("Location: admin_login.php"); // Redireciona para o login do administrador se não estiver logado ou não for admin
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Painel do Administrador - CTMA</title>
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
            max-width: 1200px;
            margin: 30px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1 {
            color: #003366;
            font-size: 28px;
            margin-bottom: 10px;
        }

        h2 {
            color: #003366;
            font-size: 22px;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        p {
            font-size: 16px;
            color: #555;
        }

        /* Cards */
        .card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: space-between;
        }

        .card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            width: 30%;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .card h3 {
            font-size: 20px;
            color: #003366;
            margin-bottom: 10px;
        }

        .card p {
            font-size: 14px;
            color: #777;
        }

        .card a {
            display: inline-block;
            margin-top: 15px;
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            transition: background-color 0.3s ease;
        }

        .card a:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Responsividade */
        @media (max-width: 1024px) {
            .card {
                width: 45%;
            }
        }

        @media (max-width: 768px) {
            .card {
                width: 100%;
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
        <h1>Painel do Administrador</h1>
        <p>Bem-vindo, <?php echo htmlspecialchars($_SESSION['user_nome']); ?>! Aqui você pode gerenciar o sistema.</p>

        <div class="card-container">
            <div class="card">
                <h3>Gerenciamento de Usuários</h3>
                <p>Adicione, edite ou remova usuários.</p>
                <a href="visualizar_usuarios.php">Gerenciar Usuários</a>
            </div>

            <div class="card">
                <h3>Cadastro de Itens</h3>
                <p>Cadastre novos bimestres, cursos, disciplinas e módulos.</p>
                <a href="adicionar_bimestre.php">Adicionar Bimestre</a>
            </div>

            <div class="card">
                <h3>Cadastrar Professores</h3>
                <p>Cadastre novos professores e administradores do sistema.</p>
                <a href="cadastro_restrito.php">Cadastrar Professores</a>
            </div>
        </div>

        <div class="card-container">
            <div class="card">
                <h3>Adicionar Curso</h3>
                <p>Cadastre novos cursos oferecidos pelo CTMA.</p>
                <a href="adicionar_curso.php">Adicionar Curso</a>
            </div>

            <div class="card">
                <h3>Adicionar Disciplina</h3>
                <p>Cadastre novas disciplinas para os cursos.</p>
                <a href="adicionar_disciplina.php">Adicionar Disciplina</a>
            </div>

            <div class="card">
                <h3>Adicionar Módulo</h3>
                <p>Cadastre novos módulos para os cursos.</p>
                <a href="adicionar_modulo.php">Adicionar Módulo</a>
            </div>
        </div>

        
        <a href="logout.php" style="display: inline-block; padding: 12px 30px; background-color: #dc3545; color: #fff; text-decoration: none; border-radius: 5px; margin-top: 20px;">SAIR</a>
        
    </div>

    <?php include_once "footer.php"; ?>
</body>

</html>
