<?php 
    include "../../config/configs.php";
    include "../../funcs/inscricoes.funcs.php";

    $ligacao = ligarDB();
    $inscricoes = obterInscricoes($ligacao);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../styleListar.css">
    <title>Gerir Inscrições</title>
</head>
<body class="listar">
    <div class="boxTop">
        <?php include "../../componentes/nav.php" ?>
        <h1>Gerir Inscrições</h1>
        <a href="adicionar.php">Adicionar Inscrição</a><br><br>
    </div>
    <div class="boxBottom">
        <table>
            <tr class="tableTop">
                <th>ID</th>
                <th>Ano Lectivo</th>
                <th>Data Início</th>
                <th>Área de Gestão</th>
            </tr>
            <?php foreach($inscricoes as $inscricao) { ?>
                <tr class="tableBottom">
                    <td><?php echo $inscricao['id'];?></td>
                    <td><?php echo $inscricao['anoLetivo'];?></td>
                    <td><?php echo $inscricao['dataInicio'];?></td>
                    <td class="tableBottomOptions">
                        <a href="ver.php?id=<?php echo $inscricao['id'];?>">Ver</a>
                        <a href="editar.php?id=<?php echo $inscricao['id'];?>">Editar</a>
                        <a href="apagar.php?id=<?php echo $inscricao['id'];?>">Apagar</a>
                    </td>
                </tr> 
            <?php } ?>    
        </table>
    </div>
</body>
</html>