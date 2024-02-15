<?php
    require '../dbconn.php';

    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        $id = $_GET['id'];
        $stmt = $dbh->prepare("DELETE FROM news WHERE id = :id");
        $stmt->execute([':id' => $id]);
        header("Location: ../admin/index.php?menu=news");
        exit; }
?>

