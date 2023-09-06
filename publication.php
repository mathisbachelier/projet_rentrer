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
            echo $_GET['edit'];
    //     die('Erreur : l\'article n\'existe pas...'); 
}
    }

   

        if(isset($_POST['recette_titre'], $_POST['categories'], $_POST['descriptif_rec'], $_POST['intro'])){
        $mail = $_SESSION['mail'];
        $recette_titre = htmlspecialchars($_POST['recette_titre']);
        $categories = htmlspecialchars($_POST['categories']);
        $descriptif_rec = htmlspecialchars($_POST['descriptif_rec']);
        $intro = htmlspecialchars($_POST['intro']);
        
        if($mode_edition == 0){
        exif_imagetype($_FILES['miniature']['tmp_name']);

            $QUERY = ('INSERT INTO `recettes` (nom, categorie, descriptions,id_user_mail, intro,date_publication) VALUES(?, ?, ?, ?, ?, NOW())');
            $ins = $BDD->prepare($QUERY);
            $ins->execute(array($recette_titre, $categories, $descriptif_rec,$mail, $intro));
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

            $update = $BDD->prepare('UPDATE recettes SET nom = ? , descriptions = ?, categorie = ?, intro = ? where id_recettes_pub = ?');
            $update->execute(array($recette_titre, $descriptif_rec, $categories, $intro, $edit_id));
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
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: sticky; top : 0px; z-index : 1; background-color: #6a994e !important;">
            <div class="container">
                <a class="navbar-brand" href="#!">Cook'nShare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="main.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Profile.php">Profile</a></li>    
                        <li class="nav-item"><a class="nav-link" href="publication.php">post</a></li>
                        <li class="nav-item"><a class="nav-link" href="deconnection.php">logout</a></li>

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
        <textarea name="intro" placeholder="parles nous de ta recette" required><?php if($mode_edition == 1) {
          ?><?= $edit_article['intro']?><?php }?></textarea>
          <br>
        <textarea name="descriptif_rec" placeholder="les instructions de ta recette" required><?php if($mode_edition == 1) {
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
        <footer class="py-5 bg-dark" style="background-color:  !important;">
            <div class="container"><p class="m-0 text-center text-white">Copyright © CooK'nShare 2023</p></div>
        </footer>
</html>
