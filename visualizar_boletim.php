<?php
session_start();
require 'conexao.php';

// Verifique se o usuário está autenticado e é um aluno
if (!isset($_SESSION['user_tipo']) || $_SESSION['user_tipo'] !== 'aluno') {
    header("Location: login.php");
    exit;
}

// Obtenha boletins do aluno logado
$aluno_id = $_SESSION['user_id'];
$sql = "SELECT disciplinas.nome AS disciplina, modulos.numero AS modulo, bimestres.numero AS bimestre, boletins.nota ,boletins.faltas,boletins.frequencia
        FROM boletins
        JOIN disciplinas ON boletins.disciplina_id = disciplinas.id
        JOIN bimestres ON boletins.bimestre_id = bimestres.id
        JOIN modulos ON bimestres.modulo_id = modulos.id
        WHERE boletins.aluno_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $aluno_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boletim do Aluno</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <style>
        /* Estilos Gerais */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

       

        /* Conteúdo Principal */
        main {
            flex: 1;
            padding: 2rem;
            max-width: 1200px;
            margin: auto;
        }

        h2 {
            font-size: 2rem;
            margin-bottom: 1.5rem;
            color: #005577;
            text-align: center;
        }

        /* Estilo da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 1rem;
        }

        th, td {
            padding: 1rem;
            border: 1px solid #ddd;
            text-align: left;
        }

        th {
            background-color: #66ccff;
            color: #fff;
            font-weight: 700;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        tr:hover {
            background-color: #e3f2fd;
        }

        /* Mensagem de boletins não registrados */
        .no-data {
            font-size: 1.2rem;
            text-align: center;
            padding: 2rem;
            color: #ff6600;
        }

        /* Botão de Download/Imprimir */
        .actions {
            text-align: right;
            margin-top: 1rem;
        }

        .btn-download , button{
            background-color: #005577;
            color: #fff;
            padding: 0.5rem 1rem;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            display: inline-flex;
            align-items: center;
        }

        .btn-download i {
            margin-right: 0.5rem;
        }

        .btn-download:hover , button{
            background-color: #004466;
        }
        

        /* Responsividade */
        @media (max-width: 768px) {
            th, td {
                padding: 0.5rem;
            }
            .btn-download {
                font-size: 0.9rem;
            }
        }
    </style>
</head>

<body>
<?php include_once"header.php" ?>
 

    <!-- Conteúdo Principal -->
    <main>
        <h2>Boletim do Aluno</h2>

        <?php if ($result->num_rows > 0): ?>
            <div class="actions">
                <button class="btn-download" onclick="window.print()"><i class="fas fa-download"></i>Download PDF</button>
                <button onclick="window.history.back()" class="voltar-button">Voltar</button>
            </div>
            
            <table>
                <thead>
                    <tr>
                        <th>Disciplina</th>
                        <th>Módulo</th>
                        <th>Bimestre</th>
                        <th>Nota</th>
                        <th>Faltas</th>
                        <th>Frequência (%)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['disciplina']); ?></td>
                            <td><?php echo htmlspecialchars($row['modulo']); ?></td>
                            <td><?php echo htmlspecialchars($row['bimestre']); ?></td>
                            <td><?php echo htmlspecialchars($row['nota']); ?></td>
                            <td><?php echo htmlspecialchars($row['faltas']); ?></td>
                            <td><?php echo htmlspecialchars($row['frequencia']); ?>%</td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p class="no-data">Você ainda não possui boletins registrados.</p>
        <?php endif; ?>
    </main>

    <!-- Rodapé -->
    <?php include_once"footer.php" ?>
</body>

</html>
