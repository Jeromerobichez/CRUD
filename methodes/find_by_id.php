<?php
// find_by_id.php

require_once 'pages/connect.php';

function findById($id, $table) {
    global $pdo;

    try {
        $query = "SELECT * FROM $table WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } else {
            return null;
        }
    } catch (PDOException $e) {
        echo 'Erreur de recherche : ' . $e->getMessage();
    }
}
