<?php
session_start();
require_once('bdd.php');

if(isset($_GET['id_recettes_pub']) AND !empty($_GET['id_recettes_pub'])){
    $get_id = htmlspecialchars($_GET['id_recettes_pub']);

    $article = $BDD-> prepare('SELECT * FROM recettes WHERE id_recettes_pub = ?');
    $article->execute(array($get_id));

    if($article->rowcount() == 1){
        $article = $article->fetch();
        $titre = $article['nom'];
        $contenu = $article['descriptions'];
        $img_post = $article['image_publication'];
        $date_pub = $article['date_publication'];

    }else{
        die('cet article n\'existe pas ');
    }

}else{
    die('Erreur');
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cook'nShare</title>
</head>
<body>
    <h1><?= $titre?></h1>
    <p><?=  $contenu ?></p>
    <img src="<?php $img_post?>" alt="">
    <p><?= $date_pub ?></p>
</body>
</html>