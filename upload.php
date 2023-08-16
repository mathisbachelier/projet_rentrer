<?php
session_start();
require_once('bdd.php');


//Premiere partie tu récupère le nom de l'image :
$image = basename($_SESSION['image_publication']);
$dossier = '/asset';
$extensions = array('.png', '.gif', '.jpg', '.jpeg');
$extension = strrchr($_SESSION['image_publication'], '.');
//Tu fais les vérifications nécéssaires
if(!in_array($extension, $extensions))
 //Si l'extension n'est pas dans le tableau
{
     $erreur = 'Vous devez uploader un fichier de type png, gif, jpg ou jpeg...';
}
//S'il n'y a pas d'erreur
if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
{
     //On formate le nom du fichier ici...
     $fichier = strtr($fichier,
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ',
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($_FILES['image']['tmp_name'], $dossier . $fichier))
 //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
     {
//La tu insère le nom du fichier dans ta table
$req = $bdd->prepare('INSERT INTO recettes (recettes_publication) VALUES(:image_publication)'); // Evidemment il faut mettre un WHERE .. = .. (car l'image est forcément liée à un utilisateur?)
$req->execute(array($fichier));
$req->closeCursor();
     }else
 //Sinon (la fonction renvoie FALSE.
     {
         
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}

?>

?>