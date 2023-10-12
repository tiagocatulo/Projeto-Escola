<?php
    include "../../config/configs.php";
    include "../../funcs/alunos.funcs.php"; 
    include "../../funcs/generos.funcs.php";
    include "../../funcs/cursos.funcs.php";
    include "../../funcs/turmas.funcs.php";~
    include "../../funcs/inscricoes.funcs.php";


    $id = $_GET['id'];
    $ligacao = ligarDB();

    $aluno = obterAluno($ligacao, $id); 

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_aluno = $_POST['id_aluno'];
        $nome = $_POST['nome'];
        $data_nascimento = $_POST['data_nascimento'];
        $id_generos = $_POST['id_generos'];
        $id_cursos = $_POST['id_cursos'];
        $id_turmas = $_POST['id_turmas'];
        $id_inscricoes = $_POST['id_inscricoes'];

        editarAluno($ligacao, $id_aluno, $nome, $data_nascimento, $id_generos, $id_cursos, $id_turmas, $id_inscricoes);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../style.css">
    <link rel="stylesheet" href="../../editar.css">
    <title>Editar Aluno - <?php echo $aluno['nome']; ?></title>
</head>
<body class="editarBox">
    <?php include "../../componentes/nav.php"; ?>
    <div class="editarBox2">
        <h1>Editar Aluno: <?php echo $aluno['nome']; ?></h1>
        <div class="editarBox3">
            <form method="POST">
                <input type="hidden" name="id_aluno" value="<?php echo $aluno['id']; ?>">
                <div class="editarInput">
                    <label>Aluno:</label>        
                    <input type="text" name="nome" value="<?php echo $aluno['nome']; ?>" required>    
                    <label>Data de Nascimento:</label>
                    <input type="date" name="data_nascimento" value="<?php echo $aluno['data_nascimento']; ?>" required>
                    
                    <label>Género:</label>
                    <select name="id_generos" required>
                        <?php
                        $generos = obterGeneros($ligacao);
                        foreach ($generos as $genero) {
                            $selected = ($genero['id'] == $aluno['id_generos']) ? 'selected' : '';
                            echo '<option value="' . $genero['id'] . '" ' . $selected . '>' . $genero['nome'] . '</option>';
                        }
                        ?>
                    </select>

                    <label>Curso:</label>
                    <select name="id_cursos" required>
                        <?php
                        $cursos = obterCursos($ligacao);
                        foreach ($cursos as $curso) {
                            $selected = ($curso['id'] == $aluno['id_cursos']) ? 'selected' : '';
                            echo '<option value="' . $curso['id'] . '" ' . $selected . '>' . $curso['nomeCurso'] . '</option>';
                        }
                        ?>
                    </select>

                    <label>Turma:</label>
                    <select name="id_turmas" required>
                        <?php
                        $turmas = obterTurmas($ligacao);
                        foreach ($turmas as $turma) {
                            $selected = ($turma['id'] == $aluno['id_turmas']) ? 'selected' : '';
                            echo '<option value="' . $turma['id'] . '" ' . $selected . '>' . $turma['nomeTurma'] . '</option>';
                        }
                        ?>
                    </select>

                    <label>Inscrição:</label>
                    <select name="id_inscricoes" required>
                        <?php
                        $inscricoes = obterInscricoes($ligacao);
                        foreach ($inscricoes as $inscricao) {
                            $selected = ($inscricao['id'] == $aluno['id_inscricoes']) ? 'selected' : '';
                            echo '<option value="' . $inscricao['id'] . '" ' . $selected . '>' . $inscricao['dataInicio'] . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="editarButton">
                    <input type="submit" value="Editar Aluno">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
