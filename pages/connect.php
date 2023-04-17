<?php
define('USER',"tutu");
define('PASSWD',"tata");
define('SERVER', "localhost");
define('BASE',"car_rent");
// https://www.hostinger.fr/tutoriels/creer-un-utilisateur-mysql


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
