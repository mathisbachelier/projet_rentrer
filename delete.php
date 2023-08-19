<?php 
session_start();
require_once('bdd.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
    $suppr_id = htmlspecialchars($_GET['id']);
    
    $suppr = $BDD->prepare('DELETE FROM recettes where id_recettes_pub = ?');
    $suppr->execute(array($suppr_id));

    header("location: Profile.php");
}


?>