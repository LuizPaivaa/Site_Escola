<?php
session_start();
require 'conexao.php';

// Verifica se o usuário é professor
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'professor') {
    header("Location: login.php");
    exit;
}

// Obtém o ID do professor logado
$professor_id = $_SESSION['user_id'];

// Obter todos os cursos
$sql_cursos = "SELECT id, nome FROM cursos";
$cursos_result = $conn->query($sql_cursos);
$cursos = $cursos_result->num_rows > 0 ? $cursos_result->fetch_all(MYSQLI_ASSOC) : [];

// Obter todos os módulos
$sql_modulos = "SELECT id, numero FROM modulos";
$modulos_result = $conn->query($sql_modulos);
$modulos = $modulos_result->num_rows > 0 ? $modulos_result->fetch_all(MYSQLI_ASSOC) : [];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Visualizar Alunos por Curso e Módulo</title>
    <style>
    /* Estilos gerais */
    html, body {
        height: 100%;
        margin: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
        display: flex;
        flex-direction: column;
    }

    /* Estilo para o menu de navegação */
    nav {
        background-color: #333;
        color: #fff;
        padding: 15px 0;
        text-align: center;
    }

    nav ul {
        list-style: none;
        padding: 0;
    }

    nav ul li {
        display: inline;
        margin-right: 20px;
    }

    nav ul li a {
        color: #fff;
        text-decoration: none;
        font-size: 16px;
    }

    nav ul li a:hover {
        text-decoration: underline;
    }

    /* Estilo para o container principal */
    .container {
        flex: 1; /* Faz o conteúdo ocupar o espaço restante */
        max-width: 800px;
        margin: 20px auto;
        padding: 20px;
        background-color: #fff;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    /* Títulos */
    h1, h2 {
        color: #333;
        text-align: center;
    }

    /* Estilo para o formulário */
    form {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 20px;
    }

    select {
        padding: 8px;
        width: 100%;
        max-width: 300px;
        margin-bottom: 10px;
        font-size: 14px;
        border: 1px solid #ddd;
        border-radius: 5px;
    }

    button {
        padding: 10px 15px;
        background-color: #007BFF;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
    }

    button:hover {
        background-color: #0056b3;
    }

    /* Estilo para a tabela de alunos */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    table,
    th,
    td {
        border: 1px solid #ddd;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
        color: #333;
    }

    tr:nth-child(even) {
        background-color: #f9f9f9;
    }

    tr:hover {
        background-color: #f1f1f1;
    }

    /* Estilo para mensagens */
    .no-alunos {
        text-align: center;
        color: #ff0000;
        font-weight: bold;
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
    <?php include_once "header.php"; ?>

    <main>
    <div class="container">
        <h1>Visualizar Alunos por Curso e Módulo</h1>

        <h2>Selecione um Curso e Módulo:</h2>
        <form method="GET" action="">
            <select name="curso_id" required>
                <option value="">Selecione um curso</option>
                <?php foreach ($cursos as $curso): ?>
                    <option value="<?php echo $curso['id']; ?>"><?php echo htmlspecialchars($curso['nome']); ?></option>
                <?php endforeach; ?>
            </select>

            <select name="modulo_id" required>
                <option value="">Selecione um módulo</option>
                <?php foreach ($modulos as $modulo): ?>
                    <option value="<?php echo $modulo['id']; ?>"><?php echo htmlspecialchars($modulo['numero']); ?></option>
                <?php endforeach; ?>
            </select>

            <button type="submit">Visualizar</button>
            <button onclick="window.history.back()" class="voltar-button">Voltar</button>
        </form>

        <?php if (isset($_GET['curso_id']) && isset($_GET['modulo_id'])): ?>
        <?php
            $curso_id = intval($_GET['curso_id']);
            $modulo_id = intval($_GET['modulo_id']);
            
            $sql_alunos = "SELECT id, nome, email FROM usuarios WHERE curso_id = ? AND modulo_id = ?";
            $stmt = $conn->prepare($sql_alunos);
            $stmt->bind_param("ii", $curso_id, $modulo_id);
            $stmt->execute();
            $result_alunos = $stmt->get_result();

            if ($result_alunos->num_rows > 0): ?>
                <h2>Alunos do Curso e Módulo Selecionado</h2>
                <table>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                    <?php while ($aluno = $result_alunos->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($aluno['id']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['nome']); ?></td>
                        <td><?php echo htmlspecialchars($aluno['email']); ?></td>
                    </tr>
                    <?php endwhile; ?>
                </table>
            <?php else: ?>
                <p class="no-alunos">Nenhum aluno encontrado para este curso e módulo.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
    </main>

    <?php include_once "footer.php"; ?>
</body>

</html>
