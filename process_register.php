<?php
session_start();
include("dbconn.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname  = $_POST['lastname'];
    $email     = $_POST['email'];
    $country   = $_POST['country'];
    $password  = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $sql  = "INSERT INTO users (firstname, lastname, email, password, country) VALUES (?, ?, ?, ?, ?)";
    $stmt = $dbh->prepare($sql);
    $stmt->execute([$firstname, $lastname, $email, $password, $country]);

    $_SESSION['message'] = "User registered successfully";
    header("Location: ../index.php");
    exit; } 
else { echo "Invalid request"; }
?>