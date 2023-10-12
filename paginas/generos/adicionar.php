<?php 
    include "../../config/configs.php";
    include "../../funcs/Generos.funcs.php";

    $ligacao = ligarDB();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST['nome'];
        inserirGenero($ligacao, $nome);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../adicionar.css">
    <title>Inserir Novo Género</title>
</head>
<body class="adicionarBox">
    <?php include "../../componentes/nav.php" ?>
    <div class="adicionarBox2">
        <h1>Adicionar Novo Género</h1>
        <div class="adicionarBox3">
            <form method="POST">
                <div class="adicionarInput">
                    <label for="nome">Género:</label>        
                    <input type="text" name="nome" id="nome" required>      
                </div>
                <div class="adicionarButton">
                    <input type="submit" value="Adicionar Género">
                </div>
            </form>
        </div>
    </div>
</body>
</html>