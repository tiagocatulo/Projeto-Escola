<?php
    include "../../config/configs.php";
    include "../../funcs/disciplinas.funcs.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $ligacao = ligarDB();
    $id = $_GET['id'];

    apagarDisciplina($ligacao, $id);
    }
?>