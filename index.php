<!DOCTYPE html>

<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
        .wrapper{
            width: 700px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
</head>

<h1>Bienvenue sur MyVan</h1>
<h2 class="fst-italic fw-light"> La location de van disruptive</h2>

</html>

<?php 
require("pages/connect.php");


    $connexion = connect_bd();

    $sql="SELECT * from car_model";
    if(!$connexion->query($sql)) echo "Pb d'accès à la base de données";
else{
?>
<div class="d-flex justify-content-center mt-4">
<h2 class="mt-5">  Modèles disponibles dans la flotte :  </h2> 
</div>
<div class="d-flex justify-content-center mt-4">
<table class="border border-3 border-black w-75 ">
<tr class="bg-primary"> <td class="border p-3 w-50 text-center"> <strong> model </strong> </td> <td class="border p-3 w-50 text-center"> nombres de places </td></tr>
<?php
  foreach ($connexion->query($sql) as $row)

echo "<tr >
<td class='border-end p-3 d-flex justify-content-center text-center'>
<a href=pages/van-details.php?id=".$row['id']."> <button class='p-2 bg-light border border-secondary rounded-2'>"
.$row['model']."
</button>
</a>
</td
><td class='p-3 .d-inline-flex justify-content-center text-center'>".
  $row['pax']."</td></tr>\n";
  ?>
  </table>
</div>
<?php } ?>
<html>
<div class="d-flex justify-content-around border border-3 border-dark m-5">
<h2 class="mt-2">
    Créer un nouveau véhicule : 
</h2>
<button type="button" class="bg-success border border-2 border-dark rounded-3 p-2 m-2">
    <a class="text-decoration-none text-light " href="./methodes/vehicles/create.php">
        Créer un nouveau véhicule 
    </a>
</button>
      </div>
  <div class="d-flex justify-content-center">
<h2 class="mt-4">
  <a href="methodes/vehicles/read.php"> 
    <button class="bg-primary border border-secondary rounded-2 p-2">
     Voir la liste des véhicules existants
</button>
  </a>
</h2>
</div>
</html>
