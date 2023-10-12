<?php
include "../../config/configs.php";
include "../../funcs/alunos.funcs.php";

$ligacao = ligarDB();
$alunos = obterAlunos($ligacao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../styleListar.css">
    <title>Alunos</title>
</head>
<body class="listar">
    <div class="boxTop">
        <?php include "../../componentes/nav.php" ?>
        <h1>Gestão de Alunos</h1>
        <a href="adicionar.php">Adicionar Aluno</a><br><br>
    </div>
    <div class="boxBottom">
        <table>
            <tr class="tableTop">
                <th>ID</th>
                <th>Nome</th>
                <th>Data Nascimento</th>
                <th>Género</th>
                <th>Curso</th>
                <th>Turma</th>
                <th>Inscrição</th>
                <th colspan="4">Área de Gestão</th>
            </tr>
            <?php foreach ($alunos as $aluno) { ?>
                <tr class="tableBottom">
                    <td><?php echo $aluno['id']; ?></td>
                    <td><?php echo $aluno['nome']; ?></td>
                    <td><?php echo $aluno['data_nascimento']; ?></td>
                    <td><?php echo $aluno['genero']; ?></td>
                    <td><?php echo $aluno['nomeCurso']; ?></td>
                    <td><?php echo $aluno['nomeTurma']; ?></td>
                    <td><?php echo $aluno['dataInicio']; ?></td>
                    <td class="tableBottomOptions">
                        <a href="ver.php?id=<?php echo $aluno['id']; ?>">Ver</a>
                        <a href="editar.php?id=<?php echo $aluno['id']; ?>">Editar</a>
                        <a href="apagar.php?id=<?php echo $aluno['id']; ?>">Apagar</a>
                    </td>
                </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>