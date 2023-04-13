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
    <thead>
        <tr>
            <th>Van numéro</th>
            <th>Model</th>
            <th>Contenance du réservoir</th>
            <th>Tailles des pneus</th>
            <th>Nombres de places</th>
            <th>ID du véhicule</th>
            <th>KM parcourus</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($connexion->query($sql) as $row){ ?>
            <tr>
                <td><?=$row['v_id'] ?></td>
                <td><?=$row['model'] ?></td>
                <td><?=$row['tank'] ?> litres</td>
                <td><?=$row['tires'] ?></td>
                <td><?=$row['pax'] ?></td>
                <td><?=$row['v_id'] ?></td>
                <td><?=$row['km'] ?> km</td>
                <td>
                    <a href="update.php?id=<?= $row['v_id'] ?>" class="btn btn-primary">Modifier le véhicule</a>
                    <a href="delete.php?id=<?= $row['v_id'] ?>" class="btn btn-danger">Supprimer le véhicule</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php foreach ($connexion->query($sql) as $row){ ?>
    <div class="border border-3 border-dark rounded-2 w-50 m-2 bg-warning p-2"> 
        <h3> Van numéro : <span class="bg-primary border rounded-2 px-2"> <?=$row['v_id'] ?> </span></h3>
<div>        
<span class="">Model : </span> <span class="text-primary fw-bold py-1 px-2"><?=$row['model'] ?> </span> </div>
<div><span> Contenance du réservoir : </span> <span class="text-primary fw-bold"> <?=$row['tank'] ?> litres </span> </div>
<div><span> Tailles des pneus :</span> <span class="text-primary fw-bold"> <?=$row['tires'] ?> </span> </div>
<div><span> Nombres de places :</span> <span class="text-primary fw-bold"> <?=$row['pax'] ?></span> </div>
<div><span>  ID du véhicule :</span> <span class="text-primary fw-bold"> <?=$row['v_id'] ?></span> </div>
<div><span>  KM parcourus :</span> <span class="text-primary fw-bold"> <?=$row['km'] ?> km</span> </div>

<div class="mt-2">
<button type="button" class=" border border-primary border-2 rounded-2"> <a class="text-decoration-none" href="update.php?id=<?= $row['v_id'] ?>"> Modifier le véhicule </a></button>
<button type="button" class=" border border-danger border-2 rounded-2"> <a class="text-danger text-decoration-none" href="delete.php?id=<?= $row['v_id'] ?>"> Supprimer le véhicule </a></button>
</div>
<br/>
<br/>
</div>
<?php } ?>
</body>
</html>
