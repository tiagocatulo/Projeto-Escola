<?php
include "../../config/configs.php";
include "../../funcs/turmas.funcs.php"; 

$id = $_GET['id'];
$ligacao = ligarDB();
$turmas = obterTurma($ligacao, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_turma'];
    $nomeTurma = $_POST['nomeTurma'];

    editarTurma($ligacao, $id, $nomeTurma);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Turma <?php echo $turmas['nomeTurma']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Turma <?php echo $turmas['nomeTurma']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_turma" value="<?php echo $turmas['id']; ?>">
                <div class="editarInput">
                    <label>Turma:</label>
                    <input type="text" name="nomeTurma" value="<?php echo $turmas['nomeTurma']; ?>" required>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Turma">
                </div>
            </form>
        </div>
    </div>
</body>
</html>