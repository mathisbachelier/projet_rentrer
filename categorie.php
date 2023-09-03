<?php
session_start();
require_once 'bdd.php';
require_once 'unacces.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
<!-- Responsive navbar-->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Cook'nShare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="main.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="publication.php">post</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <header class="py-3 bg-light border-bottom mb-2">
    <?php

    if ($_GET['id'] == 1) {
        $l1 = $_GET['id'];
    }
    if ($_GET['id'] == 2) {
        $l2 = $_GET['id'];
    }
    if ($_GET['id'] == 3) {
        $l3 = $_GET['id'];
    }
    if ($_GET['id'] == 4) {
        $l4 = $_GET['id'];
    }if ($_GET['id'] == 5) {
        $l5 = $_GET['id'];
    }


    if(isset($l1)){
        $req = $BDD->prepare("SELECT * FROM recettes where categorie = ? ORDER BY date_publication DESC ");
        $req->execute(array("entré"));
        while($r = $req->fetch()){ ?>
            <li>
            
            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
            <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
            <?= $r['nom']?>
            </a>
 
            </li>
        
            <?php }
            }?>
    <?php 
    if(isset($l2)){
        $req = $BDD->prepare("SELECT * FROM recettes where categorie = ? ORDER BY date_publication DESC");
        $req->execute(array("plat"));
        while($r = $req->fetch()){ ?>
            <li>
            
            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
            <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
            <?= $r['nom']?>
            </a>
    
        
            <?php }
            }?>
    <?php
    if(isset($l3)){
        $req = $BDD->prepare("SELECT * FROM recettes where categorie = ? ORDER BY date_publication DESC");
        $req->execute(array("dessert"));
        while($r = $req->fetch()){ ?>
            <li>
            
            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
            <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
            <?= $r['nom']?>
            </a>
        
            </li>
        
            <?php }
            }?>
    <?php
    
    if(isset($l4)){
        $req = $BDD->prepare("SELECT * FROM recettes where categorie = ? ORDER BY date_publication DESC ");
        $req->execute(array("appéritif"));
        while($r = $req->fetch()){ ?>
            <li>
            
            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
            <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
            <?= $r['nom']?>
            </a>
            
            </li>
        
            <?php }
            }?>
    <?php
    if(isset($l5)){
        $req = $BDD->prepare("SELECT * FROM recettes where categorie = ? ORDER BY date_publication DESC");
        $req->execute(array("autre"));
        while($r = $req->fetch()){ ?>
            <li>
            
            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
            <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
            <?= $r['nom']?>
            </a>
            
            </li>
        
            <?php }
            }?>
    <?php

    ?>

    
</body>
</html>