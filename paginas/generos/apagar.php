<?php
    include "../../config/configs.php";
    include "../../funcs/generos.funcs.php"; 

    if($_SERVER['REQUEST_METHOD'] == 'GET'){

    $ligacao = ligarDB();
    $id = $_GET['id'];

    apagarGenero($ligacao, $id);
    }
?>