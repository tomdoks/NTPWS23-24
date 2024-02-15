<?php

    $user   = 'root';
    $pass   = '';
    $port   = '3306';
    $host   = '127.0.0.1';
    $dbname = 'zadatak';

    $dbh = new PDO("mysql:host=$host;port=$port;dbname=$dbname", $user, $pass);

?>
