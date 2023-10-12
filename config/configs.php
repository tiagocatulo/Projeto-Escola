<?php
//servidor
define("DB_HOST", "localhost");
//utilizador da base de dados
define("DB_USER", "root");
//palavra-passe do utilizador da base de dados
define("DB_PASS", "");
//nome da base de dados
define("DB_NAME", "escola");
//link para a base de dados
define("DSN_USE", "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME);
//configuração dos erros da ligação à base de dados
define("CONFIG_OP", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//ligação à base de dados
function ligarDB(){
    try{
        $conn = new PDO(DSN_USE, DB_USER, DB_PASS); //ligar à base de dados
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        //echo "Ligação efetuada com sucesso";
    } catch(PDOException $e){
        echo "Ligação falhou: " . $e->getMessage();
    }

    return $conn;
}
?>