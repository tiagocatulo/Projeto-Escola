<?php
// Devolve todos os cursos da base de dados
function obterCursos($ligacao) {
    $stmt = $ligacao->query("SELECT * FROM cursos");
    $cursos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $cursos;
}

// Devolve um curso pelo seu ID
function obterCurso($ligacao, $id) {
    $stmt = $ligacao->prepare("SELECT * FROM cursos WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $curso = $stmt->fetch(PDO::FETCH_ASSOC);

    return $curso;
}

// Insere um curso na base de dados
function inserirCurso($ligacao, $nomeCurso) {
    $stmt = $ligacao->prepare("INSERT INTO cursos (nomeCurso) VALUES (:nomeCurso)");
    $stmt->bindParam(":nomeCurso", $nomeCurso);
    $stmt->execute();

    header("Location: ../cursos/listar.php");
}

// Edita um curso na base de dados
function editarCurso($ligacao, $id, $nomeCurso) {
    $stmt = $ligacao->prepare("UPDATE cursos SET nomeCurso=:nomeCurso WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nomeCurso", $nomeCurso);
    $stmt->execute();

    header("Location: ../cursos/listar.php");
}

// Apaga um curso na base de dados
function apagarCurso($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM cursos WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: ../cursos/listar.php");
}
?>