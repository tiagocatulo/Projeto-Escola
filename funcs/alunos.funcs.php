<?php
// Devolve todos os alunos da base de dados
function obterAlunos($ligacao) {
    $stmt = $ligacao->query(
        "SELECT a.id, a.nome, a.data_nascimento, g.nome AS genero, c.nomeCurso AS nomeCurso, t.nomeTurma AS nomeTurma, i.dataInicio AS dataInicio  
        FROM alunos a, generos g, cursos c, turmas t, inscricoes i 
        WHERE a.id_generos = g.id AND a.id_cursos = c.id AND a.id_turmas = t.id AND a.id_inscricoes = i.id"
    );

    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $alunos;
}

// Devolve um alunos da base de dados pelo seu ID
function obterAluno($ligacao, $id) {
    $stmt = $ligacao->prepare(
        "SELECT a.id, a.nome, a.data_nascimento, g.nome AS genero, c.nomeCurso AS nomeCurso, t.nomeTurma AS nomeTurma, i.dataInicio AS dataInicio 
        FROM alunos a 
        INNER JOIN generos g ON a.id_generos = g.id 
        INNER JOIN cursos c ON a.id_cursos = c.id 
        INNER JOIN turmas t ON a.id_turmas = t.id 
        INNER JOIN inscricoes i ON a.id_turmas = i.id 
        WHERE a.id = :id"
    );

    $stmt->bindParam(":id", $id);
    $stmt->execute();
    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);

    return $aluno;
}

// Insere um aluno na base de dados
function inserirAluno($ligacao, $nome, $data_nascimento, $id_generos, $id_cursos, $id_turmas, $id_inscricoes) {
    $stmt = $ligacao->prepare(
        "INSERT INTO Alunos (nome, data_nascimento, id_generos, id_cursos, id_turmas, id_inscricoes) 
        VALUES (:nome, :data_nascimento, :id_generos, :id_cursos, :id_turmas, :id_inscricoes)"
    );

    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":data_nascimento", $data_nascimento);
    $stmt->bindParam(":id_generos", $id_generos);
    $stmt->bindParam(":id_cursos", $id_cursos);
    $stmt->bindParam(":id_turmas", $id_turmas);
    $stmt->bindParam(":id_inscricoes", $id_inscricoes);
    $stmt->execute();

    header("Location: ../alunos/listar.php");
}

// Edita um aluno da base de dados
function editarAluno($ligacao, $id, $nome, $data_nascimento, $id_generos, $id_cursos, $id_turmas, $id_inscricoes) {
    $stmt = $ligacao->prepare(
        "UPDATE Alunos 
        SET nome=:nome, data_nascimento=:data_nascimento, id_generos=:id_generos, id_cursos=:id_cursos, 
        id_turmas=:id_turmas, id_inscricoes=:id_inscricoes 
        WHERE id=:id"
    );

    $stmt->bindParam(":id", $id);
    $stmt->bindParam(":nome", $nome);
    $stmt->bindParam(":data_nascimento", $data_nascimento);
    $stmt->bindParam(":id_generos", $id_generos);
    $stmt->bindParam(":id_cursos", $id_cursos);
    $stmt->bindParam(":id_turmas", $id_turmas);
    $stmt->bindParam(":id_inscricoes", $id_inscricoes);
    $stmt->execute();

    header("Location: ../alunos/listar.php");
}

// Apaga um aluno da base de dados
function apagarAluno($ligacao, $id) {
    $stmt = $ligacao->prepare("DELETE FROM Alunos WHERE id=:id");
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: ../alunos/listar.php");
}
?>