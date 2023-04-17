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
$image = $row['image'];
}
?>

<!DOCTYPE html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <header>
    <button class="bg-primary border border-2 border-dark rounded-3 p-3 m-3">
       <a class="text-decoration-none text-light " href='../index.php'> <span> back to home </span> </a>
        </button>
</header>
<h1>Bienvenue sur la page du : <?php echo $model ?></h1>
<div class="bg-warning border border-dark border-2 rounded-2 m-5 w-80 d-flex justify-content-around">
    <div class="p-4 w-60">
        <div class="d-flex  flex-row justify-content-around ">
<div> Contenance du réservoir&nbsp;: </div><div class="text-light"> <?php echo $tank ?> litres </div> </div>
<div class="d-flex  flex-row justify-content-around ">
<div> Tailles des pneus&nbsp;: </div> <div class="text-light"> <?php echo $tires ?> </div> </div>
<div class="d-flex  flex-row justify-content-around ">
<div> Nombres de places&nbsp;: </div> <div class="text-light">  <?php echo $pax ?> </div> </div>
</div>
<div class="w-45">
        <img class="img-fluid rounded-2 p-3 border-2 border-dark " src="<?php echo $image ?>" />
   
</div>
</div>
</body>
</html>
