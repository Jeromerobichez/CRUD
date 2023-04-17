<?php 


require("../../pages/connect.php");

    $connexion = connect_bd();
   /*  $id = $_GET['id']; */
    $sql="SELECT * from vehicles JOIN car_model ON car_model.id = vehicles.model ORDER BY vehicles.v_id";
    $results = $connexion->query($sql);

    if(!$connexion->query($sql)) echo "Pb d'accès à la base de données pour la lecture des véhicules";
?>

<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
    <header>
       
</header>
<div class="d-flex justify-content-between align-items-center">
<h1 class="mx-2"> Page véhicules </h1>
<button class="bg-primary border border-2 border-dark rounded-3 p-3 m-3">
       <a class="text-decoration-none text-light " href='../../index.php'> <span> back to home </span> </a>
        </button>
</div>
<h2 class="mt-2">
    Créer un nouveau véhicule : 
</h2>
<button type="button" class="bg-success border border-2 border-dark rounded-3 p-2 m-2">
    <a class="text-decoration-none text-light " href="create.php">
        Créer un nouveau véhicule 
    </a>
</button>
<h2>  Liste des véhicules existants :   </h2>

<table class="table">
    <thead class="bg-secondary">
        <tr class="align-middle text-center">
            <th>Van numéro</th>
            <th>Model</th>
            <th>Couleur</th>
            <th>Contenance du réservoir</th>
            <th>Tailles des pneus</th>
            <th>Nombres de places</th>
            <th>KM parcourus</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($connexion->query($sql) as $row){ ?>
            <tr class="align-middle text-center">
                <td ><span class="p-2 bg-warning border border-dark border-2 rounded-2 text-light"><?=$row['v_id'] ?> </span></td>
                <td class=""><?=$row['model'] ?></td>
                <td class=""><?=$row['color'] ?></td>
                <td><?=$row['tank'] ?> litres</td>
                <td><?=$row['tires'] ?></td>
                <td><?=$row['pax'] ?> places</td>
                <td><?=$row['km'] ?>&nbsp;km</td>
                <td>
                <div class="mt-2">
<button type="button" class=" border border-primary border-2 rounded-2 m-2"> <a class="text-decoration-none" href="update.php?id=<?= $row['v_id'] ?>"> Modifier le véhicule </a></button>
<button type="button" class=" border border-danger border-2 rounded-2 m-2"> <a class="text-danger text-decoration-none" href="delete.php?id=<?= $row['v_id'] ?>"> Supprimer le véhicule </a></button>
</div>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

</body>
</html>
