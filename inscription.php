<!DOCTYPE html>
<html><link rel="stylesheet" href="style.css">
<p id="backindex"><a  href="index.php">revenir sur la page de connection</a></p></html>
<?php
session_start();
require_once 'bdd.php';

if( isset($_POST['mail']) and isset($_POST['password']) and isset($_POST['username'])){

$email = $_POST['mail'];
$password = $_POST['password'];
$username = $_POST['username'];

$query = "SELECT * FROM users WHERE mail ='".$email."'";

$stmt = $BDD->query($query);


$rows = $stmt->fetchAll();

if (count($rows)== 0) {
    $preparedStmt= $BDD->prepare("INSERT INTO users (mail,pass,username) VALUES(:mail,SHA1(:pass),:username)");
    $preparedStmt->execute(array(":mail" =>$email, ":pass" =>$password, ":username" =>$username));
    header('location:main.php');    
}else{

    echo "<script>alert(\"Cet email est déjà utilisé\");</script>";



}
  

}

?>
