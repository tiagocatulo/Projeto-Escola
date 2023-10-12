<?php 
// Devolve todos os géneros da base de dados
function obterGeneros($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM generos");
    $generos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $generos;
}

// Devolve um género literário pelo seu ID
function obterGenero($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM generos WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $genero = $stmt->fetch(PDO::FETCH_ASSOC);
    return $genero;
}

// Insere um género na base de dados
function inserirGenero($ligacao, $nome) {
    $stmt = $ligacao->prepare("INSERT INTO generos (nome) VALUES(:nome)");
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();
    header("Location: ../generos/listar.php");
}

// Edita um género na base de dados
function editarGenero($ligacao, $id, $nome) {
    $stmt = $ligacao->prepare("UPDATE generos SET nome=:nome WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();
    header("Location: ../generos/listar.php");
}

// Apaga um género da base de dados
function apagarGenero($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM generos WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    header("Location: ../generos/listar.php");
}
?>