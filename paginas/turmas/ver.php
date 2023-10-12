<?php 
include "../../config/configs.php";
include "../../funcs/turmas.funcs.php";

$id = $_GET['id'];
$ligacao = ligarDB();
$turma = obterTurma($ligacao, $id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../ver.css">
    <title>Turma <?php echo $turma["nomeTurma"];?></title>
</head>
<body class="verBox">
    <?php include "../../componentes/nav.php" ?>    
    <h1>Turma <?php echo $turma["nomeTurma"];?></h1>
    <div class="verBox2">
        <div class="verBox3">
            <p>
                <label>ID: </label><?php echo $turma['id']; ?><br>
            </p>
        </div>
        <div class="verBox4">
            <p>
                <label>Turma: </label><?php echo $turma['nomeTurma']; ?><br>
            </p>
        </div>
    </div>
</body>
</html>