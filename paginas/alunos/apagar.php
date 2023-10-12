<?php
    include "../../config/configs.php";
    include "../../funcs/alunos.funcs.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $ligacao = ligarDB();
    $id = $_GET['id'];

    apagarAluno($ligacao, $id);
    }
?>