<?php 


require("connect.php");

    $connexion = connect_bd();
    $id = $_GET['id'];
    $sql="SELECT * from car_model WHERE id = $id";
    $result = $connexion->query($sql);
    if(!$connexion->query($sql)) echo "Pb d'accès à la base de données pour les détails";
else{
?>
<?php

foreach ($connexion->query($sql) as $row) 
$model= $row['model'];
$tires= $row['tires'];
$tank = $row['tank'];
$pax = $row['pax'];
}
?>

<!DOCTYPE html>
<head>
</head>
<body>
    <header>
       <a href='../index.php'> <h3> back to home </h3> </a>
</header>
<h1>Bienvenue sur la page du : <?php echo $model ?></h1>
<div> Contenance du réservoir :  <?php echo $tank ?> litres </div>
<div> Tailles des pneus :  <?php echo $tires ?> </div>
<div> Nombres de places :  <?php echo $pax ?> </div>
</body>
</html>
