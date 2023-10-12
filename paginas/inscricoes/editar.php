<?php 
    include "../../config/configs.php";
    include "../../funcs/inscricoes.funcs.php";

    $id = $_GET['id'];
    $ligacao = ligarDB();

    $inscricao = obterInscricao($ligacao, $id);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_inscricoes = $_POST['id_inscricoes'];
        $anoLetivo = $_POST['anoLetivo'];
        $dataInicio = $_POST['dataInicio'];

        editarInscricao($ligacao, $id, $anoLetivo, $dataInicio);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Inscrição <?php echo $inscricao['id']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Inscrição: <?php echo $inscricao['id']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_inscricao" value="<?php echo $inscricao['id']; ?>">
                <div class="editarInput">
                    <label for="anoLetivo">Ano Lectivo:</label>        
                    <input type="text" name="anoLetivo" id="anoLetivo" value="<?php echo $inscricao['anoLetivo']; ?>" required>
                    <label for="data_inicio">Data Início:</label>                 
                    <input type="date" name="dataInicio" id="dataInicio" value="<?php echo $inscricao['dataInicio']; ?>" required>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Inscrição">
                </div>
            </form>
        </div>
    </div>
</body>
</html>