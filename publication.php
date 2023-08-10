<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cook'nShare</title>
</head>
<body>
    <?php
    session_start();
    require_once ('bdd.php');
    ?>

    <form method="post">
        <input type="text" placeholder='le nom de la recette'><br>  
        <select name="categories" >
        <option value="">--choisie la catégorie</option>
        <option value="entré">entré</option>
        <option value="plat">plat</option>
        <option value="desert">desert</option>
        <option value="appéritif">appéritif</option>
        </select><br>
        <textarea placeholder="descriptif de la recette"></textarea>
        <form action="upload.php" method="post" enctype="multipart/form-data">
        <p>Select image to upload:</p>
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="Upload Image" name="submit">
        </form>
        <input type="submit" value="envoyer l'article">
    </form>
    
</body>
</html>