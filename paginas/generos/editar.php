<?php 
    include "../../config/configs.php";
    include "../../funcs/generos.funcs.php"; 

    $id = $_GET['id'];
    $ligacao = ligarDB();

    $genero = obterGenero($ligacao, $id); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_genero = $_POST['id_genero'];
        $nome = $_POST['nome'];

        editarGenero($ligacao, $id_genero, $nome);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Género <?php echo $genero['nome']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Género: <?php echo $genero['nome']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_genero" value="<?php echo $genero['id']; ?>">
                <div class="editarInput">
                    <label for="nome">Género:</label>        
                    <input type="text" name="nome" id="nome" value="<?php echo $genero['nome']; ?>" required>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Género">
                </div>
            </form>
        </div>
    </div>
</body>
</html>