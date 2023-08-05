<?php
// Souvent on identifie cet objet par la variable $conn ou $db
$mysqlConnection = new PDO(
    'mysql:host=localhost;dbname=projet_septembre;charset=utf8',
    'root',
    'root'
);
?>