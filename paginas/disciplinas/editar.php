<?php
include "../../config/configs.php";
include "../../funcs/disciplinas.funcs.php";

$id = $_GET['id'];
$ligacao = ligarDB();

$disciplina = obterDisciplina($ligacao, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_disciplina = $_POST['id_disciplina'];
    $nome = $_POST['nome'];
    $dataInicio = $_POST['dataInicio'];

    editarDisciplina($ligacao, $id_disciplina, $nome, $dataInicio);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Disciplina <?php echo $disciplina['nome']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Disciplina: <?php echo $disciplina['nome']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_disciplina" value="<?php echo $disciplina['id']; ?>">
                <div class="editarInput">
                    <label for="nome">Disciplina:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $disciplina['nome']; ?>" required>
                    <label for="dataInicio">Data de Início:</label>
                    <input type="date" name="dataInicio" id="dataInicio" value="<?php echo $disciplina['dataInicio']; ?>" required>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Disciplina">
                </div>
            </form>
        </div>
    </div>
</body>
</html>