<?php
session_start();
require 'conexao.php';

// Verifica se o usuário é professor
if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'professor') {
    header("Location: login.php");
    exit;
}

// Processa as atualizações dos boletins se houver um POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    foreach ($_POST['nota'] as $boletim_id => $nota) {
        $faltas = $_POST['faltas'][$boletim_id];
        $frequencia = $_POST['frequencia'][$boletim_id];

        // Atualiza os dados do boletim no banco de dados
        $sql = "UPDATE boletins SET nota = ?, faltas = ?, frequencia = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("diii", $nota, $faltas, $frequencia, $boletim_id);
        $stmt->execute();
    }
    $mensagem = "Boletins atualizados com sucesso!";
}

// Consulta para obter os boletins
$sql = "SELECT 
            b.id AS boletim_id, 
            u.nome AS aluno_nome, 
            d.nome AS disciplina_nome, 
            bimestre.numero AS bimestre_numero, 
            b.nota, 
            b.faltas, 
            b.frequencia 
        FROM boletins b
        INNER JOIN usuarios u ON b.aluno_id = u.id
        INNER JOIN disciplinas d ON b.disciplina_id = d.id
        INNER JOIN bimestres bimestre ON b.bimestre_id = bimestre.id";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Visualizar e Editar Boletins</title>
    <style>
        <style>
    /* Estilos globais */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
        font-family: 'Arial', sans-serif;
        background-color: #f5f5f5;
        display: flex;
        flex-direction: column;
    }

    body {
        background-color: #f5f5f5;
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
    
    /* Container principal */
    .container {
        max-width: 900px;
        margin: 30px auto;
        padding: 30px;
        background-color: #fff;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }

    main {
        flex: 1;
        padding: 2rem;
        max-width: 1200px;
        margin: auto;
    }

    /* Cabeçalho da página */
    h1 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    /* Tabela de boletins */
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

    th, td {
        padding: 12px;
        text-align: left;
    }

    th {
        background-color: #333;
        color: #fff;
    }

    /* Input e botões */
    .form-input {
        width: 100px;
        padding: 5px;
        margin: 0;
        border: 1px solid #ddd;
        border-radius: 4px;
        background-color: #f9f9f9;
    }

    .form-input:focus {
        border-color: #007BFF;
        outline: none;
    }

    /* Botão de salvar */
    .save-button {
        padding: 8px 15px;
        background-color: #28a745;
        color: #fff;
        border: none;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.3s ease;
    }

    .save-button:hover {
        background-color: #218838;
    }

    .save-button:disabled {
        background-color: #6c757d;
        cursor: not-allowed;
    }

    /* Estilos de mensagem */
    .message {
        background-color: #d4edda;
        color: #155724;
        padding: 10px;
        border-radius: 4px;
        margin-bottom: 20px;
    }

    .message.error {
        background-color: #f8d7da;
        color: #721c24;
    }

    /* Responsividade */
    @media (max-width: 768px) {
        .container {
            padding: 15px;
        }

        table th, table td {
            font-size: 14px;
        }

        .form-input {
            width: 80px;
        }
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
    </style>
</head>

<body>
    <?php include_once "header.php"; ?>
    <main>
        <div class="container">
            <h1>Visualizar e Editar Boletins</h1>

            <?php if (isset($mensagem)): ?>
                <p><?php echo $mensagem; ?></p>
            <?php endif; ?>

            <?php if ($result->num_rows > 0): ?>
            <form action="" method="post">
                <table>
                    <thead>
                        <tr>
                            <th>Aluno</th>
                            <th>Disciplina</th>
                            <th>Bimestre</th>
                            <th>Nota</th>
                            <th>Faltas</th>
                            <th>Frequência (%)</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['aluno_nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['disciplina_nome']); ?></td>
                            <td><?php echo htmlspecialchars($row['bimestre_numero']); ?></td>
                            <td>
                                <input type="number" name="nota[<?php echo $row['boletim_id']; ?>]" class="form-input"
                                    step="0.01" value="<?php echo htmlspecialchars($row['nota']); ?>">
                            </td>
                            <td>
                                <input type="number" name="faltas[<?php echo $row['boletim_id']; ?>]" class="form-input"
                                    value="<?php echo htmlspecialchars($row['faltas']); ?>">
                            </td>
                            <td>
                                <input type="number" name="frequencia[<?php echo $row['boletim_id']; ?>]" class="form-input"
                                    step="0.01" value="<?php echo htmlspecialchars($row['frequencia']); ?>">
                            </td>
                            <td>
                                <button type="submit" name="salvar[<?php echo $row['boletim_id']; ?>]"
                                    class="save-button">Salvar</button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </form>
            <?php else: ?>
            <div class="message error">
                <p>Nenhum boletim encontrado para edição.</p>
            </div>
            <?php endif; ?>
        </div>
        <button onclick="window.history.back()" class="voltar-button">Voltar</button>
    </main>

    <?php include_once "footer.php"; ?>
</body>
</html>
