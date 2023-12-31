<?php
include "../../config/configs.php";
include "../../funcs/cursos.funcs.php";

$id = $_GET['id'];
$ligacao = ligarDB();

$curso = obterCurso($ligacao, $id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_curso'];
    $nome = $_POST['nome'];
    editarCurso($ligacao, $id, $nome);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Curso - <?php echo $curso['nomeCurso']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Curso: <?php echo $curso['nomeCurso']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_curso" value="<?php echo $curso['id']; ?>">
                <div class="editarInput">
                    <label for="nome">Curso:</label>
                    <input type="text" name="nome" id="nome" value="<?php echo $curso['nomeCurso']; ?>" required>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Curso">
                </div>
            </form>
        </div>
    </div>
</body>
</html>