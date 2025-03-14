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
$sql = "SELECT nome, email, modulo_id FROM usuarios WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $aluno_id);
$stmt->execute();
$result = $stmt->get_result();
$aluno = $result->fetch_assoc();

// Obtém os módulos disponíveis
$sql_modulos = "SELECT id, numero FROM modulos";
$result_modulos = $conn->query($sql_modulos);
$modulos = $result_modulos->fetch_all(MYSQLI_ASSOC);

// Atualiza as informações se o formulário for enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $modulo_id = $_POST['modulo_id'];

    $sql = "UPDATE usuarios SET nome = ?, email = ?, modulo_id = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $nome, $email, $modulo_id, $aluno_id);

    if ($stmt->execute()) {
        $mensagem = "Informações atualizadas com sucesso!";
    } else {
        $mensagem = "Erro ao atualizar informações: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Informações</title>

    <style>
         <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f4f4f4;
    }

    .container {
        max-width: 600px;
        margin: 50px auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
    }

    label {
        display: block;
        margin: 10px 0 5px;
    }

    input[type="text"],
    input[type="email"] {
        width: 100%;
        padding: 10px;
        margin-bottom: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        width: 100%;
        padding: 10px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }

    button:hover {
        background-color: #0056b3;
    }

    .message {
        color: green;
        text-align: center;
        margin-bottom: 20px;
    }

    .error {
        color: red;
        text-align: center;
        margin-bottom: 20px;
    }
    </style>
    </style>
</head>
<body>
<?php include_once "header.php"; ?>
    <div class="container">
        <h2>Atualizar Informações</h2>

        <?php if (isset($mensagem)): ?>
        <p class="message"><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="atualizar_informacoes.php" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" name="nome" value="<?php echo htmlspecialchars($aluno['nome']); ?>" required>

            <label for="email">Email:</label>
            <input type="email" name="email" value="<?php echo htmlspecialchars($aluno['email']); ?>" required>

            <label for="modulo">Módulo:</label>
            <select name="modulo_id" required>
                <?php foreach ($modulos as $modulo): ?>
                    <option value="<?php echo $modulo['id']; ?>" 
                        <?php if ($aluno['modulo_id'] == $modulo['id']) echo 'selected'; ?>>
                        <?php echo htmlspecialchars($modulo['numero']); ?>
                    </option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Atualizar</button>
        </form>
    </div>
    <?php include_once "footer.php"; ?>
</body>
</html>
