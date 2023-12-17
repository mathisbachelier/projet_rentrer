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
    

        <?php if(isset($message)) {echo $message;} ?>
    </form>
    <div class="content">
        <div class="container">
            <div class="row align-items-stretch no-gutters contact-wrap">
            <div class="col-md-12" style="padding-top: 20px; padding-bottom: 20px !important; border: thick double #70994c; border-radius: 15px; margin-top: 15px !important ; margin-bottom: 15px !important ;">
            <div class="form h-100">
            <h3>Poste ta recette :)<!DOCTYPE html></h3>
            <form class="mb-5" method="post" enctype="multipart/form-data">
            <div class="row">
            <div class="col-md-6 form-group mb-3">
            <label for="" class="col-form-label">Le titre de ta recette :</label><br>
            <input type="text"  class="form-control" name="recette_titre" placeholder='le nom de la recette' <?php if($mode_edition == 1) {
          ?>  value="<?= $edit_article['nom']?>"<?php } ?> required >
            </div>
            <div class="col-md-12 form-group mb-3" style="align-items: center;">
            <label for="budget" class="col-form-label" >Choissi la catégorie de ta recette :</label><br>
            <select name="categories" <?php if($mode_edition == 1) {
            ?> value="<?= $edit_article['categorie']?>"<?php } ?> required>
            <option value="">--choisie la catégorie</option>
            <option value="entré">entré</option>
            <option value="plat">plat</option>
            <option value="dessert">dessert</option>
            <option value="appéritif">appéritif</option>
            <option value="autre">autre</option>
            </select>
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 form-group mb-3">
            <label for="" class="col-form-label">Description :</label>
            <textarea class="form-control" name="intro" placeholder="Donne nous une petite description de ta recettes :" required><?php if($mode_edition == 1) {
          ?><?= $edit_article['intro']?><?php }?></textarea>
            
            </div>
            </div>
            <div class="row">
            <div class="col-md-12 form-group mb-3">
            <label for="message" class="col-form-label">préparation :</label>
            <textarea class="form-control" name="descriptif_rec" placeholder="Ecrit les ingrédients et les étapes de préparation de ta recette " required><?php if($mode_edition == 1) {
          ?><?= $edit_article['descriptions']?><?php }?></textarea>
            </div>
            <?php if($mode_edition == 0) {
          ?>
            <div class="row">
                <div class="col-md-12 form-group mb-3">
                <label for="message" class="col-form-label">image à upload :</label> <br>
                <input type="file" name="miniature" >
            </div> <?php } ?> 
        <br>

            </div>
            <div class="row">
            <div class="col-md-12 form-group">
            <input type="submit" value="submit" class="btn btn-primary rounded-0 py-2 px-4" style="border-radius: 15px !important; border: solid;">
            
            </div>
            </div>
            </form>
            
            </div>
            </div>
            </div>
        </div>
</div>
    
</body>
        <footer class="py-5 bg-dark" style="background-color: #6a994e !important;">
            <div class="container"><p class="m-0 text-center text-white">Copyright © CooK'nShare 2023</p></div>
        </footer>
</html>
