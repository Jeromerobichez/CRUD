<?php
define('USER',"user"); // remplace user par votre utilisateur MySQL
define('PASSWD',"password"); // remplace password par le mot de passe correspondant
define('SERVER', "localhost");
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
