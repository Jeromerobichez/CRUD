<?php
require("../../pages/connect.php");

$pdo = connect_bd();
$msg = '';
$id = $_GET['id'];
if (isset($_GET)) {
    if (!empty($_POST)) {
        $id = isset($_POST['v_id']) ? $_POST['v_id'] : NULL;
        $model = isset($_POST['model']) ? $_POST['model'] : '';
        $color = isset($_POST['color']) ? $_POST['color'] : '';
        $km = isset($_POST['km']) ? $_POST['km'] : '';

        $stmt = $pdo->prepare('UPDATE vehicles SET v_id= ?, model = ?, color = ?, km = ? WHERE v_id = ?');
        $stmt->execute([$id, $model, $color, $km, $_GET['id']]);
        $msg = 'your van has been updated Successfully!';
        header("Location: read.php");
        exit();
    }
    // Get the contact from the contacts table
    $stmt = $pdo->prepare('SELECT * FROM vehicles WHERE v_id = ? ');
    $stmt->execute([$_GET['id']]);
    $vehicles = $stmt->fetch(PDO::FETCH_ASSOC);
   
    if (!$vehicles) {
        exit('vehicle doesn\'t exist with that ID!');
    }
} else {
    exit('No ID specified!');
}
?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

<div>
    <h1>Modification d'un véhicule : </h1>
    <form action="update.php?id=<?= $id ?>" method="post"
    class="border border-3 border-dark rounded-2 w-50 m-2 bg-warning p-2">
    <div class="d-flex justify-content-between">
        <span>
        <label for="v_id">ID : </label></span>
        <span>
        <input type="text" name="v_id" placeholder="<?= $id ?>" value="<?= $vehicles['v_id'] ?>" id="v_id">
</span>
    </div>
<div class="d-flex justify-content-between">
<span>
        <label for="model">MODEL</label></span>
        <span>
        <input type="text" name="model" placeholder="<?= $vehicles['model'] ?>" value="<?= $vehicles['model'] ?>"
            id="model">
            </span>     
</div>
<div class="d-flex justify-content-between">
<span>
        <label for="v_id">COLOR : </label></span>
        <span>
        <input type="text" name="color" placeholder="<?= $vehicles['color'] ?>" value="<?= $vehicles['color'] ?>"
            id="color">
            </span>
</div>
<div class="d-flex justify-content-between">
<span>
        <label for="id">KILOMETRES : </label></span>
        <span>
        <input type="text" name="km" placeholder="<?= $vehicles['km'] ?>" value="<?= $vehicles['km'] ?>" id="km">
        </span>
    </div>
        <input type="submit" value="Update">
    </form>
</div>

</html>
