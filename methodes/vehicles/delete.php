<?php
require("../../pages/connect.php");
$pdo = connect_bd();
$msg = '';
// Check that the contact ID exists
if (isset($_GET['id'])) {
    // Select the record that is going to be deleted
    $stmt = $pdo->prepare('SELECT * FROM vehicles WHERE v_id = ?');
    $stmt->execute([$_GET['id']]);
    $vehicle = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$vehicle) {
        exit('Vehicle doesn\'t exist with that ID!');
    }
    // Make sure the user confirms beore deletion
    if (isset($_GET['confirm'])) {
        if ($_GET['confirm'] == 'yes') {
            // User clicked the "Yes" button, delete record
            $stmt = $pdo->prepare('DELETE FROM vehicles WHERE v_id = ?');
            $stmt->execute([$_GET['id']]);
            $msg = 'You have deleted the vehicle!';
        } else {
            // User clicked the "No" button, redirect them back to the read page
            header('Location: read.php');
            exit;
        }
    }
} else {
    exit('No ID specified!');
}
?>
<html>
<div class="content delete">
	<h2>Delete Contact #<?=$vehicle['v_id']?></h2>
    <?php if ($msg): ?>
    <p><?=$msg?></p>
    <?php else: ?>
	<p>Are you sure you want to delete contact #<?=$vehicle['v_id']?>?</p>
    <div class="yesno">
        <a href="delete.php?id=<?=$vehicle['v_id']?>&confirm=yes">Yes</a>
        <a href="delete.php?id=<?=$vehicle['v_id']?>&confirm=no">No</a>
    </div>
    <?php endif; ?>
</div>
</html>
