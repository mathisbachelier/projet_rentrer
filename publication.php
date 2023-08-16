<?php
    session_start();
    require_once ('bdd.php');
    var_dump($_FILES);
    if(isset($_POST['recette_titre'], $_POST['categories'], $_POST['descriptif_rec'])){
        $mail = $_SESSION['mail'];
        $recette_titre = htmlspecialchars($_POST['recette_titre']);
        $categories = htmlspecialchars($_POST['categories']);
        $descriptif_rec = htmlspecialchars($_POST['descriptif_rec']);

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
    }

        

        $message = "post bien poster!";

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
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="recette_titre" placeholder='le nom de la recette' required><br>  
        <select name="categories" required>
        <option value="">--choisie la catégorie</option>
        <option value="entré">entré</option>
        <option value="plat">plat</option>
        <option value="desert">desert</option>
        <option value="appéritif">appéritif</option>
        </select><br>
        <textarea name="descriptif_rec" placeholder="descriptif de la recette" required></textarea>
        <p>Select image to upload:</p>
        <input type="file" name="miniature" ><br>
        <input type="submit" value="submit">
        </form>
        <br>

        <?php if(isset($message)) {echo $message;} ?>
    </form>
    
</body>
</html>