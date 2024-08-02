<?php

    $projectId = $_POST['id'];
    $db = new PDO("sqlite:" . __DIR__ . "/db.db");
    $sql = 'DELETE FROM card '
        . 'WHERE title = :title';
    $stmt = $db->prepare($sql);
    $stmt->execute([':title' => $projectId]);
    header('Location: index.php' ); //geriye gitme

?>
