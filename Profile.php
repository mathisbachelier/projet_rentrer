<?php
session_start();
require_once 'bdd.php';
require_once ('unacces.php') ;
$publications = $BDD->query('SELECT * FROM recettes WHERE id_user_mail = "'.$_SESSION['mail'].'" ORDER BY id_recettes_pub DESC ');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Cook'nShare</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <p class="navbar-brand" href="#!">Cook'nShare</p>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="main.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">friends</a></li>

                    </ul>
                </div>
            </div>
        </nav>

    <ul>
    <?php
    while($p = $publications->fetch()){ ?>
    <li>

    <a href="post.php?id_recettes_pub=<?= $p['id_recettes_pub']?>">
    <img src="asset/.<?= $p['id_recettes_pub'] ?>.jpeg" width=100/> <br>
    <?= $p['nom']?>
    </a>|
    <a href="publication.php?edit=<?= $p['id_recettes_pub']?>" >modifier</a> | <a href="delete.php?id=<?= $p['id_recettes_pub']?>">supprimer</a>
    </li>

    <?php }?>

    <br>

    <a href="publication.php">publiez votre recette !!</a>
    </ul>
   
</body>
</html>