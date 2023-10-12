<?php
include "../../config/configs.php";
include "../../funcs/alunos.funcs.php";

$id = $_GET['id'];
$ligacao = ligarDB();
$aluno = obterAluno($ligacao, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../ver.css">
    <title>Alunos - <?php echo $aluno["nome"];?></title>
</head>
<body class="verBox">
    <?php include "../../componentes/nav.php" ?>    
    <h1>Aluno - <?php echo $aluno["nome"];?></h1>
    <div class="verBox2">
        <div class="verBox3">
            <p><label>ID: </label><?php echo $aluno['id']; ?></p><br>
        </div>
        <div class="verBox4">
            <p><label>Aluno: </label><?php echo $aluno['nome']; ?></p><br>
            <p><label>Data de Nascimento: </label><?php echo $aluno['data_nascimento']; ?></p><br>
            <p><label>Género: </label><?php echo $aluno['genero']; ?></p><br>
            <p><label>Curso: </label><?php echo $aluno['nomeCurso']; ?></p><br>
            <p><label>Turma: </label><?php echo $aluno['nomeTurma']; ?></p><br>
            <p><label>Inscrição: </label><?php echo $aluno['dataInicio']; ?></p><br>
        </div>
    </div>
</body>
</html>