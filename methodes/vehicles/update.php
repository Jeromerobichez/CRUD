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
<div>
    <h1>Modification d'un véhicule : </h1>
    <form action="update.php?id=<?= $id ?>" method="post">
        <label for="v_id">ID : </label>
        <input type="text" name="v_id" placeholder="<?= $id ?>" value="<?= $vehicles['v_id'] ?>" id="v_id">
        <label for="model">MODEL</label>
        <input type="text" name="model" placeholder="<?= $vehicles['model'] ?>" value="<?= $vehicles['model'] ?>"
            id="model">
        <label for="v_id">COLOR : </label>
        <input type="text" name="color" placeholder="<?= $vehicles['color'] ?>" value="<?= $vehicles['color'] ?>"
            id="color">
        <label for="id">KILOMETRES : </label>
        <input type="text" name="km" placeholder="<?= $vehicles['km'] ?>" value="<?= $vehicles['km'] ?>" id="km">
        <input type="submit" value="Update">
    </form>
</div>

</html>
