<?php 
// Devolve todos os professores da base de dados
function obterProfessores($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM professores");
    $professores = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $professores;
}

// Devolve um professor pelo seu ID
function obterProfessor($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM professores WHERE id = :id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $professor = $stmt->fetch(PDO::FETCH_ASSOC);
    return $professor;
}

// Insere um professor na base de dados 
function inserirProfessor($ligacao, $nome) {
    $stmt = $ligacao->prepare("INSERT INTO professores (nome) VALUES(:nome)");
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();
    header("Location: ../professores/listar.php");
}

// Edita um professor na base de dados
function editarProfessor($ligacao, $id, $nome) {
    $stmt = $ligacao->prepare("UPDATE professores SET nome=:nome WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nome", $nome);
    $stmt->execute();
    header("Location: ../professores/listar.php");
}

// Apaga um professor da base de dados 
function apagarProfessor($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM professores WHERE id = :id");
    $stmt->bindParam(":id", $id);    
    $stmt->execute();
    header("Location: ../professores/listar.php");
}
?>