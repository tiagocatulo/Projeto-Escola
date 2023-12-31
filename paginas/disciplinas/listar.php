<?php
include "../../config/configs.php";
include "../../funcs/disciplinas.funcs.php";

$ligacao = ligarDB();
$disciplinas = obterDisciplinas($ligacao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../styleListar.css">
    <title>Gestão de Disciplinas</title>
</head>
<body class="listar">
    <div class="boxTop">
        <?php include "../../componentes/nav.php" ?>
        <h1>Gestão de Disciplinas</h1>
        <a href="adicionar.php">Adicionar Disciplina</a><br><br>
    </div>
    <div class="boxBottom">
        <table>
            <tr class="tableTop">
                <th>ID</th>
                <th>Nome</th>
                <th>Data de Início</th>
                <th colspan="4">Área de Gestão</th>
            </tr>
            <?php foreach ($disciplinas as $disciplina) { ?>
                <tr class="tableBottom">
                    <td><?php echo $disciplina['id']; ?></td>
                    <td><?php echo $disciplina['nome']; ?></td>
                    <td><?php echo $disciplina['dataInicio']; ?></td>
                    <td class="tableBottomOptions">
                        <a href="ver.php?id=<?php echo $disciplina['id']; ?>">Ver</a>
                        <a href="editar.php?id=<?php echo $disciplina['id']; ?>">Editar</a>
                        <a href="apagar.php?id=<?php echo $disciplina['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>