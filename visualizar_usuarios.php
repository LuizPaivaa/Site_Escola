<?php
session_start();
require 'conexao.php';

// Verifique se o usuário está autenticado e é um aluno
if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'admin') {
    header("Location: login.php");
    exit;
}

// Função para excluir o usuário
if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $queryExcluir = "DELETE FROM usuarios WHERE id = $id";
    $conn->query($queryExcluir);
    header('Location: admin_dashboard.php'); // Redireciona para a página de administração
    exit();
}

// Atualizar informações do usuário
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['editar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $tipo = $_POST['tipo'];
    
    $queryEditar = "UPDATE usuarios SET nome = '$nome', email = '$email', tipo = '$tipo' WHERE id = $id";
    $conn->query($queryEditar);
    header('Location: admin_dashboard.php'); // Redireciona após editar
    exit();
}

// Buscar todos os usuários
$query = "SELECT * FROM usuarios";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Administração de Usuários - CTMA</title>

    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 1em 0;
    }

    main {
        padding: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 15px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: white;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

    .actions {
        display: flex;
        gap: 10px;
    }

    .button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 5px;
        text-decoration: none;
    }

    .button-danger {
        background-color: #f44336;
    }

    .form-container {
        background-color: white;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin: 20px 0;
    }

    footer {
        text-align: center;
        padding: 10px 0;
        background-color: #333;
        color: #fff;
        position: relative;
        bottom: 0;
        width: 100%;
    }
    </style>
</head>

<body>

    <?php include_once"header.php" ?>
    <main>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Data de Cadastro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['nome']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['tipo']; ?></td>
                    <td><?php echo date("d/m/Y H:i", strtotime($row['data_cadastro'])); ?></td>
                    <td class="actions">
                        <a href="#editar<?php echo $row['id']; ?>" class="button">Editar</a>
                        <a href="?excluir=<?php echo $row['id']; ?>" class="button button-danger"
                            onclick="return confirm('Tem certeza que deseja excluir este usuário?');">Excluir</a>
                    </td>
                </tr>
                <!-- Formulário de edição (oculto até ser clicado) -->
                <div id="editar<?php echo $row['id']; ?>" class="form-container">
                    <h3>Editar Usuário</h3>
                    <form action="admin_dashboard.php" method="POST">
                        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" value="<?php echo $row['nome']; ?>" required>
                        <label for="email">Email</label>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                        <label for="tipo">Tipo</label>
                        <select name="tipo" required>
                            <option value="aluno" <?php echo ($row['tipo'] == 'aluno') ? 'selected' : ''; ?>>Aluno
                            </option>
                            <option value="professor" <?php echo ($row['tipo'] == 'professor') ? 'selected' : ''; ?>>
                                Professor</option>
                            <option value="admin" <?php echo ($row['tipo'] == 'admin') ? 'selected' : ''; ?>>Admin
                            </option>
                        </select>
                        <button type="submit" name="editar" class="button">Salvar Alterações</button>
                    </form>
                </div>
                <?php endwhile; ?>
            </tbody>
        </table>
        <button onclick="window.history.back()" class="voltar-button">Voltar</button>
    </main>

    
    <?php include_once"footer.php" ?>
</body>

</html>