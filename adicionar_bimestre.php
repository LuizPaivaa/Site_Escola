<?php
session_start();
require 'conexao.php';

if ($_SESSION['user_tipo'] !== 'admin') {
    header("Location: login.php");
    exit;
}

$modulos = $conn->query("SELECT id, numero FROM modulos");

$mensagem = ''; // Variável para armazenar mensagens

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $modulo_id = $_POST['modulo_id'];
    $numero = $_POST['numero'];

    $stmt = $conn->prepare("INSERT INTO bimestres (modulo_id, numero) VALUES (?, ?)");
    $stmt->bind_param("ii", $modulo_id, $numero);
    
    if ($stmt->execute()) {
        $mensagem = "Bimestre adicionado com sucesso!";
    } else {
        $mensagem = "Erro ao adicionar bimestre. Tente novamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Adicionar Bimestre</title>
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

        select,
        input {
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
            width: 100%;
            margin-top: 8px;
        }

        select:focus,
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
        <h2>Adicionar Bimestre</h2>

        <!-- Mensagem de feedback -->
        <?php if ($mensagem): ?>
            <div class="mensagem <?php echo strpos($mensagem, 'sucesso') !== false ? 'mensagem-sucesso' : 'mensagem-erro'; ?>">
                <?php echo $mensagem; ?>
            </div>
        <?php endif; ?>

        <form method="POST" action="adicionar_bimestre.php">
            <label for="modulo_id">Módulo:</label>
            <select name="modulo_id" required>
                <?php while ($modulo = $modulos->fetch_assoc()): ?>
                    <option value="<?php echo $modulo['id']; ?>">Módulo <?php echo $modulo['numero']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="numero">Número do Bimestre:</label>
            <input type="number" name="numero" min="1" required>

            <button type="submit">Adicionar Bimestre</button>
            <button onclick="window.history.back()" class="voltar-button">Voltar</button>
        </form>
    </div>

    <?php include_once "footer.php"; ?>
</body>

</html>
