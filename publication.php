<?php
    session_start();
    require_once ('bdd.php');
    require_once ('unacces.php') ;
    
    $mode_edition = 0;

    if(isset($_GET['edit']) AND !empty($_GET['edit'])){
        $mode_edition = 1;
        $edit_id = htmlspecialchars($_GET['edit']);
        $edit_article = $BDD->prepare('SELECT * FROM recettes WHERE id_recettes_pub = ?');
        $edit_article->execute(array($edit_id));

    
    if($edit_article->rowCount()==1){
        $edit_article = $edit_article->fetch();
    
    
         }else{
        die('Erreur : l\'article n\'existe pas...');
     }
    }

   

        if(isset($_POST['recette_titre'], $_POST['categories'], $_POST['descriptif_rec'])){
        $mail = $_SESSION['mail'];
        $recette_titre = htmlspecialchars($_POST['recette_titre']);
        $categories = htmlspecialchars($_POST['categories']);
        $descriptif_rec = htmlspecialchars($_POST['descriptif_rec']);
        
        if($mode_edition == 0){
        exif_imagetype($_FILES['miniature']['tmp_name']);

            $QUERY = ('INSERT INTO `recettes` (nom, categorie, descriptions,id_user_mail,date_publication) VALUES(?, ?, ?, ?,  NOW())');
            $ins = $BDD->prepare($QUERY);
            $ins->execute(array($recette_titre, $categories, $descriptif_rec,$mail));
            $lastid = $BDD->lastInsertid();
    
            if(isset($_FILES['miniature']) AND !empty($_FILES['miniature']['name'])){
                if(exif_imagetype($_FILES['miniature']['tmp_name']) == 2){
                $chemin = 'asset/.'.$lastid.'.jpeg'; 
                move_uploaded_file ($_FILES["miniature"]["tmp_name"], $chemin );
                    }else{
                        $message = 'votre image doit être au forma jpeg';
            
             } 
            $message = "post bien poster!";   
            header("Location: profile.php");
        }
    }
        if($mode_edition == 1){

            $update = $BDD->prepare('UPDATE recettes SET nom = ? , descriptions = ?, categorie = ? where id_recettes_pub = ?');
            $update->execute(array($recette_titre, $descriptif_rec, $categories, $edit_id));
            $message = "post bien mis a jour !";
            header("Location: profile.php");
        }

        


    }


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
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="recette_titre" placeholder='le nom de la recette' <?php if($mode_edition == 1) {
          ?>  value="<?= $edit_article['nom']?>"<?php } ?> required ><br>  
        <select name="categories" <?php if($mode_edition == 1) {
          ?> value="<?= $edit_article['categorie']?>"<?php } ?> required>
        <option value="">--choisie la catégorie</option>
        <option value="entré">entré</option>
        <option value="plat">plat</option>
        <option value="dessert">dessert</option>
        <option value="appéritif">appéritif</option>
        <option value="autre">autre</option>
        </select><br>
        <textarea name="descriptif_rec" placeholder="descriptif de la recette" required><?php if($mode_edition == 1) {
          ?><?= $edit_article['descriptions']?><?php }?></textarea>

        <?php if($mode_edition == 0) {
          ?>
                  <p>Select image to upload:</p>
        <input type="file" name="miniature" ><?php } ?> 
        <br>
        <input type="submit" value="submit">
        </form>
        <br>

        <?php if(isset($message)) {echo $message;} ?>
    </form>
    
</body>
</html>