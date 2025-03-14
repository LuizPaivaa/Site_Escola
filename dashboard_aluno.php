<?php
session_start();
require 'conexao.php';

// Verifica se o usuário é aluno
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'aluno') {
    header("Location: login.php");
    exit;
}

// Obtém as informações do aluno logado
$aluno_id = $_SESSION['user_id'];
$sql = "SELECT nome, email FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $aluno_id);
$stmt->execute();
$result = $stmt->get_result();
$aluno = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard do Aluno</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
       /* Layout Base */
body {
    font-family: 'Poppins', sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f7f9fc;
}
main {
    flex: 1;
    padding: 2rem;
    max-width: 1200px;
    margin: auto;
}
.container {
    width: 100%;
    max-width: 900px;
    padding: 30px;
    background-color: #fff;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-bottom: 20px;
}

/* Logo */
.logo {
    width: 120px;
    margin-bottom: 20px;
}

/* Título Principal */
h1 {
    color: #333;
    font-size: 2em;
    font-weight: bold;
    margin-bottom: 15px;
}

/* Card de Informações */
.info-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 20px;
    background-color: #e8f4fc;
    border-radius: 12px;
    margin-bottom: 20px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.info-card h2 {
    color: #007bff;
    font-size: 1.6em;
    margin: 0;
    font-weight: bold;
}

.info-card p {
    color: #555;
    font-size: 1.1em;
}

/* Cards de Opções */
.options {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
}

.option-card {
    width: 250px;
    padding: 20px;
    background-color: #f1f5f8;
    border-radius: 10px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease, background-color 0.3s ease;
}

.option-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.1);
    background-color: #e0e7ff;
}

.option-card .icon {
    font-size: 2.5em;
    color: #007bff;
    margin-bottom: 10px;
    transition: color 0.3s ease;
}

.option-card:hover .icon {
    color: #0056b3;
}

.option-card a {
    text-decoration: none;
    color: #333;
    font-size: 1.2em;
    font-weight: bold;
}

/* Botão de Logout */
.logout-button {
    display: inline-block;
    margin-top: 20px;
    padding: 12px 25px;
    background-color: #dc3545;
    color: #fff;
    text-decoration: none;
    border-radius: 6px;
    font-size: 1.2em;
    transition: background-color 0.3s;
}

.logout-button:hover {
    background-color: #b02a37;
}

/* Responsividade */
@media (max-width: 768px) {
    .option-card {
        width: 100%;
    }
    
    .container {
        padding: 20px;
    }

    h1 {
        font-size: 1.8em;
    }
    
    .logout-button {
        width: 100%;
        padding: 15px;
    }
}

    </style>
</head>

<body>
<?php include_once "header.php"; ?>
<main>
<div class="container">
    <!-- Logo -->
    <img src="img/LOGO_DO_CTMA.png" alt="Logo" class="logo">
    
    <h1>Minha Conta</h1>

    <!-- Card de Informações -->
    <div class="info-card">
        <h2>Bem-vindo, <?php echo htmlspecialchars($aluno['nome']); ?>!</h2>
        <p>Seu ID: <?php echo htmlspecialchars($aluno_id); ?></p>
        <p>Email: <?php echo htmlspecialchars($aluno['email']); ?></p>
    </div>

    <!-- Opções -->
    <div class="options">
        <div class="option-card">
            <i class="bi bi-card-list icon"></i>
            <a href="visualizar_boletim.php">Visualizar Boletim</a>
        </div>
        <div class="option-card">
            <i class="bi bi-pencil-square icon"></i>
            <a href="atualizar_informacoes.php">Atualizar Informações</a>
        </div>
    </div>

    <!-- Botão de Logout -->
    <a href="logout.php" class="logout-button">SAIR</a>
</div>
</main>
<?php include_once "footer.php"; ?>

</body>
</html>
