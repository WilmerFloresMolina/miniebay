<?php
$servidor = "mysql:dbname=".BD.";host=".SERVIDOR;
try{
    $pdo = new PDO($servidor,USUARIO,PASSWORD,array(PDO::MYSQL_ATTR_INIT_COMMAND=>"set NAMES utf8"));
echo "<script>alert('conectando...')</script>";
}catch(PDOException $e){
    echo "<script>alert('error...')</script>";
}

?>