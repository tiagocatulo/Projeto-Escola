<?php
// Devolve todas as inscrições da base de dados
function obterInscricoes($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM inscricoes");
    $inscricoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $inscricoes;
}

// Devolve uma inscrição pelo seu ID
function obterInscricao($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM inscricoes WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $inscricao = $stmt->fetch(PDO::FETCH_ASSOC);
    return $inscricao;
}

// Insere uma inscrição na base de dados
function inserirInscricao($ligacao, $anoLetivo, $dataInicio) {
    $stmt = $ligacao->prepare("INSERT INTO inscricoes (anoLetivo, dataInicio) VALUES (:anoLetivo, :dataInicio)");
    $stmt->bindParam(":anoLetivo", $anoLetivo);
    $stmt->bindParam(":dataInicio", $dataInicio);
    $stmt->execute();
    header("Location: ../inscricoes/listar.php");
}

// Edita uma inscrição na base de dados
function editarInscricao($ligacao, $id, $anoLetivo, $dataInicio) {
    $stmt = $ligacao->prepare("UPDATE inscricoes SET anoLetivo = :anoLetivo, dataInicio = :dataInicio WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":anoLetivo", $anoLetivo);
    $stmt->bindParam(":dataInicio", $dataInicio);
    $stmt->execute();
    header("Location: ../inscricoes/listar.php");
}

// Apaga uma inscrição da base de dados
function apagarInscricao($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM inscricoes WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("Location: ../inscricoes/listar.php");
}
?>