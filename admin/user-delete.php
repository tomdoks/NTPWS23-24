<?php
    require '../dbconn.php';

    if (isset($_GET['id'])) {
        $stmt = $dbh->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute([':id' => $_GET['id']]);
        header("Location: ../admin/index.php?menu=users");
        exit; }
?>
