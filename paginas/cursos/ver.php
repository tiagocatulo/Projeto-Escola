<?php 
include "../../config/configs.php";
include "../../funcs/cursos.funcs.php";

$id = $_GET['id'];
$ligacao = ligarDB();
$curso = obterCurso($ligacao, $id);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../ver.css">
    <title>Cursos <?php echo $curso["nomeCurso"]; ?></title>
</head>
<body class="verBox">
    <?php include "../../componentes/nav.php"; ?>
    <h1>Curso de <?php echo $curso["nomeCurso"]; ?></h1>
    <div class="verBox2">
        <div class="verBox3">
            <p>
                <label>ID:</label> <?php echo $curso['id']; ?><br>
            </p>
        </div>
        <div class="verBox4">
            <p>
                <label>Curso:</label> <?php echo $curso['nomeCurso']; ?><br>
            </p>
        </div>
    </div>
</body>
</html>