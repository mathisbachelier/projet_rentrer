<?php
session_start();
require_once 'bdd.php';
$publications = $BDD->query('SELECT * FROM recettes WHERE id_user_mail = "'.$_SESSION['mail'].'" ORDER BY id_recettes_pub DESC ');


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cook'nShare</title>
</head>
<body>
    <ul>
    <?php
    while($p = $publications->fetch()){ ?>
    <li>

    <a href="post.php?id_recettes_pub=<?= $p['id_recettes_pub']?>">
    <img src="asset/.<?= $p['id_recettes_pub'] ?>.jpeg" width=100/> <br>
    <?= $p['nom']?>
    </a></li>

    <?php }?>
    </ul>

    
</body>
</html>