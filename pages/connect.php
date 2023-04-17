<?php
define('USER',"root");
define('PASSWD',"a");
define('SERVER', "79.137.33.20");
define('BASE',"car_rent");

function connect_bd(){
    $dsn="mysql:dbname=".BASE.";host=".SERVER;
    try{
    $connexion=new PDO($dsn,USER,PASSWD);
    }
    catch(PDOException $e){
    printf("Échec de la connexion : %s\n", $e->getMessage());
    exit();
    }
    return $connexion;
    }
?>
