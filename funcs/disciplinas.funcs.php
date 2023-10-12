<?php
// Devolve todas as disciplinas da base de dados
function obterDisciplinas($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM disciplinas");
    $disciplinas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $disciplinas;
}

// Devolve uma disciplina pelo seu ID
function obterDisciplina($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM disciplinas WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $disciplina = $stmt->fetch(PDO::FETCH_ASSOC);
    return $disciplina;
}

// Insere uma disciplina na base de dados
function inserirDisciplina($ligacao, $nome, $dataInicio) {
    $stmt = $ligacao->prepare("INSERT INTO disciplinas (nome, dataInicio) VALUES (:nome, :dataInicio)");
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":dataInicio", $dataInicio);
    $stmt->execute();
    header("Location: ../disciplinas/listar.php");
}

// Edita uma disciplina na base de dados
function editarDisciplina($ligacao, $id, $nome, $dataInicio) {
    $stmt = $ligacao->prepare("UPDATE disciplinas SET nome = :nome, dataInicio = :dataInicio WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":dataInicio", $dataInicio);
    $stmt->execute();
    header("Location: ../disciplinas/listar.php");
}

// Apaga uma disciplina da base de dados
function apagarDisciplina($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM disciplinas WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("Location: ../disciplinas/listar.php");
}
?>