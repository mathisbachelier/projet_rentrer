<?php
    session_start();
    require_once ('bdd.php');
    
    if(isset($_POST['recette_titre'], $_POST['categories'], $_POST['descriptif_rec'], $_POST['fileToUpload'])){
        $mail = $_SESSION['mail'];
        $recette_titre = htmlspecialchars($_POST['recette_titre']);
        $categories = htmlspecialchars($_POST['categories']);
        $descriptif_rec = htmlspecialchars($_POST['descriptif_rec']);
        $files_up = $_POST['fileToUpload'];

        
        $QUERY = ('INSERT INTO `recettes` (nom, categorie, descriptions,id_user_mail, image_publication,date_publication) VALUES(?, ?, ?, ?, ?, NOW())');
        $ins = $BDD->prepare($QUERY);
        $ins->execute(array($recette_titre, $categories, $descriptif_rec,$mail, $files_up));

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
    <form method="post">
        <input type="text" name="recette_titre" placeholder='le nom de la recette' required><br>  
        <select name="categories" required>
        <option value="">--choisie la catégorie</option>
        <option value="entré">entré</option>
        <option value="plat">plat</option>
        <option value="desert">desert</option>
        <option value="appéritif">appéritif</option>
        </select><br>
        <textarea name="descriptif_rec" placeholder="descriptif de la recette" required></textarea>
        <form action="upload.php" method="post" enctype="multipart/form-data" required >
        <p>Select image to upload:</p>
        <input type="file" name="fileToUpload" id="fileToUpload"><br>
        <input type="submit" value="submit">
        </form>
        <br>

        <?php if(isset($message)) {echo $message;} ?>
    </form>
    
</body>
</html>