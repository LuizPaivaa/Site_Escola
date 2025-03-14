<?php
require 'conexao.php';

$curso_id = $_GET['curso_id'];
$modulo_id = $_GET['modulo_id'];

$alunos = $conn->query("SELECT id, nome FROM usuarios WHERE curso_id = $curso_id AND modulo_id = $modulo_id AND tipo = 'aluno'");

$alunosArray = [];
while ($aluno = $alunos->fetch_assoc()) {
    $alunosArray[] = $aluno;
}

echo json_encode($alunosArray);
$conn->close();
?>