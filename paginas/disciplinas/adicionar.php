<?php 
include "../../config/configs.php";
include "../../funcs/disciplinas.funcs.php";

$ligacao = ligarDB();

if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $nome = $_POST['nome'];
    $dataInicio = $_POST['dataInicio'];

    inserirDisciplina($ligacao, $nome, $dataInicio);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../adicionar.css">
    <title>Inserir Nova Disciplina</title>
</head>
<body class="adicionarBox">
    <?php include "../../componentes/nav.php" ?>
    <div class="adicionarBox2">
        <h1>Adicionar Nova Disciplina</h1>
        <div class="adicionarBox3">
            <form method="POST">
                <div class="adicionarInput">
                    <label for="nome">Disciplina:</label>        
                    <input type="text" name="nome" id="nome" required>
                    <label for="dataInicio">Data de Início:</label>
                    <input type="date" name="dataInicio" id="dataInicio" required>
                </div>
                <div class="adicionarButton">
                    <input type="submit" value="Adicionar Disciplina">
                </div>
            </form>
        </div>
    </div>
</body>
</html>