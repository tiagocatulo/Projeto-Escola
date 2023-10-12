<?php 
    include "../../config/configs.php";
    include "../../funcs/inscricoes.funcs.php";

    $ligacao = ligarDB();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $ano_lectivo = $_POST['ano_lectivo'];
        $data_inicio = $_POST['data_inicio'];

        inserirInscricao($ligacao, $ano_lectivo, $data_inicio);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../adicionar.css">
    <title>Inserir Nova Inscrição</title>
</head>
<body class="adicionarBox">
    <?php include "../../componentes/nav.php" ?>
    <div class="adicionarBox2">
        <h1>Adicionar Nova Inscrição</h1>
        <div class="adicionarBox3">
            <form method="POST">
                <div class="adicionarInput">
                    <label for="ano_lectivo">Ano Lectivo:</label>
                    <input type="text" name="ano_lectivo" id="ano_lectivo" required>
                    <label for="data_inicio">Data Início:</label>
                    <input type="date" name="data_inicio" id="data_inicio" required>
                </div>
                <div class="adicionarButton">
                    <input type="submit" value="Adicionar Inscrição">
                </div>
            </form>
        </div>
    </div>
</body>
</html>