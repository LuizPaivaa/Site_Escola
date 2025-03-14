<?php
session_start();
require 'conexao.php';

$mensagem = "";

// Verifica se o usuário tem permissão de professor
if ($_SESSION['user_tipo'] !== 'professor') {
    header("Location: login.php");
    exit;
}

// Carrega cursos e módulos para os selects
$cursos = $conn->query("SELECT id, nome FROM cursos");
$modulos = $conn->query("SELECT id, numero FROM modulos");

// Função para carregar alunos e disciplinas com base no curso e módulo selecionados
if (isset($_GET['carregar_dados'])) {
    $curso_id = $_GET['curso_id'] ?? null;
    $modulo_id = $_GET['modulo_id'] ?? null;

    if ($curso_id && $modulo_id) {
        // Carrega alunos
        $alunos_stmt = $conn->prepare("SELECT id, nome FROM usuarios WHERE curso_id = ? AND modulo_id = ? AND tipo = 'aluno'");
        $alunos_stmt->bind_param("ii", $curso_id, $modulo_id);
        $alunos_stmt->execute();
        $alunos_result = $alunos_stmt->get_result();
        
        $alunos = [];
        while ($aluno = $alunos_result->fetch_assoc()) {
            $alunos[] = $aluno;
        }

        // Carrega disciplinas
        $disciplinas_stmt = $conn->prepare("SELECT id, nome FROM disciplinas WHERE curso_id = ? AND modulo_id = ?");
        $disciplinas_stmt->bind_param("ii", $curso_id, $modulo_id);
        $disciplinas_stmt->execute();
        $disciplinas_result = $disciplinas_stmt->get_result();

        $disciplinas = [];
        while ($disciplina = $disciplinas_result->fetch_assoc()) {
            $disciplinas[] = $disciplina;
        }

        header('Content-Type: application/json');
        echo json_encode(['alunos' => $alunos, 'disciplinas' => $disciplinas]);
        exit;
    }
}

// Processa o formulário para inserir notas, faltas e frequência
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $curso_id = $_POST['curso_id'];
    $modulo_id = $_POST['modulo_id'];
    $disciplina_id = $_POST['disciplina_id'];
    $bimestre_id = $_POST['bimestre_id'];

    // Obtem a lista de alunos com base no curso e módulo selecionados
    $alunos = $conn->query("SELECT id, nome FROM usuarios WHERE curso_id = $curso_id AND modulo_id = $modulo_id AND tipo = 'aluno'");
    
    while ($aluno = $alunos->fetch_assoc()) {
        $aluno_id = $aluno['id'];
        $nota = $_POST["nota_$aluno_id"];
        $faltas = $_POST["faltas_$aluno_id"];
        $frequencia = $_POST["frequencia_$aluno_id"];

        // Insere a nota, faltas e frequência no banco de dados
        $sql = "INSERT INTO boletins (aluno_id, disciplina_id, bimestre_id, nota, faltas, frequencia) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("iiiddd", $aluno_id, $disciplina_id, $bimestre_id, $nota, $faltas, $frequencia);

        if ($stmt->execute()) {
            $mensagem = "Notas cadastradas com sucesso!";
        } else {
            $mensagem = "Erro ao cadastrar notas: " . $conn->error;
        }
        $stmt->close();
    }
}

// Carrega bimestres
$bimestres = $conn->query("SELECT id, numero FROM bimestres");
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Boletim</title>
    <script>
        function carregarDados() {
            const cursoId = document.getElementById('curso_id').value;
            const moduloId = document.getElementById('modulo_id').value;

            if (cursoId && moduloId) {
                fetch(`?carregar_dados=1&curso_id=${cursoId}&modulo_id=${moduloId}`)
                    .then(response => response.json())
                    .then(data => {
                        // Popula alunos
                        const alunosContainer = document.getElementById('alunos');
                        alunosContainer.innerHTML = '';
                        data.alunos.forEach(aluno => {
                            const alunoField = document.createElement('div');
                            alunoField.innerHTML = `
                                <label>${aluno.nome}</label>
                                <input type="number" name="nota_${aluno.id}" step="0.1" required placeholder="Nota">
                                <input type="number" name="faltas_${aluno.id}" required placeholder="Faltas" min="0">
                                <input type="number" name="frequencia_${aluno.id}" required placeholder="Frequência" step="0.01" min="0" max="100">
                            `;
                            alunosContainer.appendChild(alunoField);
                        });

                        // Popula disciplinas
                        const disciplinaSelect = document.getElementById('disciplina_id');
                        disciplinaSelect.innerHTML = '<option value="">Selecione a disciplina</option>';
                        data.disciplinas.forEach(disciplina => {
                            const option = document.createElement('option');
                            option.value = disciplina.id;
                            option.textContent = disciplina.nome;
                            disciplinaSelect.appendChild(option);
                        });
                    });
            }
        }
    </script>

    <style>
         <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            color: #333;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            text-align: center;
            color: #0056b3;
        }

        label {
            display: block;
            margin-top: 15px;
            font-weight: bold;
        }

        select, input[type="number"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        #alunos div {
            display: flex;
            gap: 10px;
            align-items: center;
            margin-top: 10px;
        }

        #alunos div label {
            flex: 1;
            margin: 0;
        }

        #alunos div input[type="number"] {
            flex: 1;
            min-width: 70px;
        }

        button {
            width: 100%;
            padding: 12px;
            background-color: #0056b3;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #004494;
        }

        .buttons{
            display: flex;
            gap: 10px;
            padding-top: 10px;
        }
    </style>
    </style>
</head>

<body>
    <?php include_once "header.php"; ?>

    <main>
        <h2>Cadastro de Boletim</h2>

        <?php if ($mensagem): ?>
            <p><?php echo $mensagem; ?></p>
        <?php endif; ?>

        <form action="" method="POST">
            <label for="curso_id">Curso:</label>
            <select id="curso_id" name="curso_id" onchange="carregarDados()" required>
                <option value="">Selecione o curso</option>
                <?php while ($curso = $cursos->fetch_assoc()): ?>
                    <option value="<?php echo $curso['id']; ?>"><?php echo $curso['nome']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="modulo_id">Módulo:</label>
            <select id="modulo_id" name="modulo_id" onchange="carregarDados()" required>
                <option value="">Selecione o módulo</option>
                <?php while ($modulo = $modulos->fetch_assoc()): ?>
                    <option value="<?php echo $modulo['id']; ?>">Módulo <?php echo $modulo['numero']; ?></option>
                <?php endwhile; ?>
            </select>

            <label for="disciplina_id">Disciplina:</label>
            <select id="disciplina_id" name="disciplina_id" required>
                <option value="">Selecione a disciplina</option>
            </select>

            <label for="bimestre_id">Bimestre:</label>
            <select name="bimestre_id" required>
                <option value="">Selecione o bimestre</option>
                <?php while ($bimestre = $bimestres->fetch_assoc()): ?>
                    <option value="<?php echo $bimestre['id']; ?>">Bimestre <?php echo $bimestre['numero']; ?></option>
                <?php endwhile; ?>
            </select>

            <div id="alunos">
                <!-- Alunos serão carregados aqui -->
            </div>
            <div class="buttons">
            <button type="submit">Cadastrar Notas</button>
            <button onclick="window.history.back()" class="voltar-button">Voltar</button>
            </div>
            
        </form>
    </main>

    <?php include_once "footer.php"; ?>
</body>
</html>
