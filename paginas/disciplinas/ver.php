<?php 
    include "../../config/configs.php";
    include "../../funcs/disciplinas.funcs.php";

    $id = $_GET['id'];
    $ligacao = ligarDB();
    $disciplina = obterDisciplina($ligacao, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../ver.css">
    <title>Disciplina <?php echo $disciplina["nome"]; ?></title>
</head>
<body class="verBox">
    <?php include "../../componentes/nav.php" ?>    
    <h1>Disciplina <?php echo $disciplina["nome"]; ?></h1>
    <div class="verBox2">
        <div class="verBox3">
            <p>
                <label>ID:</label> <?php echo $disciplina['id']; ?><br>
            </p>
        </div>
        <div class="verBox4">
            <p>
                <label>Nome:</label> <?php echo $disciplina['nome']; ?><br>
                <label>Data de Início:</label> <?php echo $disciplina['dataInicio']; ?><br>
            </p>
        </div>
    </div>
</body>
</html>