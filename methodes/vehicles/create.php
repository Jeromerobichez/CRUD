
<?php
require("../../pages/connect.php");
$pdo = connect_bd();
$msg = '';
// Check if POST data is not empty
if (!empty($_POST)) {
    // Post data not empty insert a new record
    // Set-up the variables that are going to be inserted, we must check if the POST variables exist if not we can default them to blank
    $id = isset($_POST['v_id']) && !empty($_POST['v_id']) && $_POST['v_id'] != 'auto' ? $_POST['v_id'] : NULL;
    // Check if POST variable "name" exists, if not default the value to blank, basically the same for all variables
    $model = isset($_POST['model']) ? $_POST['model'] : '';
    $color = isset($_POST['color']) ? $_POST['color'] : '';
    $km = isset($_POST['km']) ? $_POST['km'] : '';
    // Insert new record into the contacts table
    $stmt = $pdo->prepare('INSERT INTO vehicles VALUES (?, ?, ?, ?)');
    $stmt->execute([$id, $model, $color, $km]);
    // Output message
    $msg = 'Created Successfully!';
}
$sql2 = "SHOW COLUMNS FROM vehicles WHERE Field = 'color'";
$stmt2 = $pdo->query($sql2);
$row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
$enumValues = array();
preg_match_all("/'([^']+)'/", $row2['Type'], $enumValues);

 $sql3 = " SELECT id, model
 FROM car_model
 ";
$stmt3 = $pdo->query($sql3);
$modelValues = $stmt3->fetchAll(PDO::FETCH_ASSOC);

?>

<html>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<div class="content update">
	<h2>Create Contact</h2>
    <form action="create.php" method="post"
    class="border border-3 border-dark rounded-2 w-50 m-2 bg-warning p-2">
<div class="d-flex justify-content-between">
    <span>
        <label for="model">Model</label>
</span>
<span>
        <select name="model" id="model">

        <?php foreach ($modelValues as $value) {
    ?> <option value="<?=$value['id']?>"><?=$value['model']?> </option>
  <?php } ?>
</select>
        </span>
        </div>

<div class="d-flex justify-content-between">
<span>
        <label for="color">Color</label> </span>
        <span>
        <select name="color" id="color">

        <?php foreach ($enumValues[1] as $value) {
  ?> <option value="<?=$value?>"><?=$value?> </option>
<?php } ?> </select>
        </span>
        </div>

        <div class="d-flex justify-content-between">
            <span>
        <label for="km">Km</label> </span>
        <span>
        <input type="text" name="km" placeholder="30" id="km">
        </span>
        </div>
        <input type="submit" value="Create">
    </form>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php endif; ?>
</div>
</html>
