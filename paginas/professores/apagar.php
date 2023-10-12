<?php
    include "../../config/configs.php";
    include "../../funcs/professores.funcs.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $ligacao = ligarDB();
    $id = $_GET['id'];

    apagarProfessor($ligacao, $id);
    }
?>