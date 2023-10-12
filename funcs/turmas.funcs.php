<?php
// Devolve todas as turmas da base de dados
function obterTurmas($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM turmas");
    $turmas = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $turmas;
}

// Devolve uma turma pelo seu ID
function obterTurma($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM turmas WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $turma = $stmt->fetch(PDO::FETCH_ASSOC);
    return $turma;
}

// Insere uma turma na base de dados
function inserirTurma($ligacao, $nomeTurma) {
    $stmt = $ligacao->prepare("INSERT INTO turmas (nomeTurma) VALUES(:nomeTurma)");
    $stmt->bindParam(":nomeTurma", $nomeTurma, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../turmas/listar.php");
    exit();
}

// Edita uma turma na base de dados
function editarTurma($ligacao, $id, $nomeTurma) {
    $stmt = $ligacao->prepare("UPDATE turmas SET nomeTurma = :nomeTurma WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":nomeTurma", $nomeTurma, PDO::PARAM_STR);
    $stmt->execute();
    header("Location: ../turmas/listar.php");
    exit();
}

// Apaga uma turma da base de dados
function apagarTurma($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM turmas WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    header("Location: ../turmas/listar.php");
    exit();
}
?>