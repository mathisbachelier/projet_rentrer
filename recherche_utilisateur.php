<?php
  session_start();
  require_once 'bdd.php';
  require_once 'unacces.php';

    if(isset($_GET['nome'])){
    $nom = $_GET['nome'];
    echo "voici les resultats pour la recherche $nom";

    $req = $BDD->query("SELECT * FROM recettes WHERE nom = '$nom' ");

    while($r = $req->fetch()){ ?>
        <li>
        
        <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
        <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
        <?= $r['nom']?>
        </a>|
        <a href="publication.php?edit=<?= $p['id_recettes_pub']?>" >modifier</a> | <a href="delete.php?id=<?= $p['id_recettes_pub']?>">supprimer</a>
        </li>
    
        <?php }
        }?>
    



