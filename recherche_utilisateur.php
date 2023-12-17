<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Cook'nShare</title>
        <!-- Favicon-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="styles.css" rel="stylesheet">
</head>
<body>        
  <?php 
    session_start();
    require_once 'bdd.php';
    require_once 'unacces.php';
  
      if(isset($_GET['nome'])){
      $nom = $_GET['nome'];
      $_SESSION['nome'] = $nom;
  
      $req = $BDD->query("SELECT * FROM recettes WHERE nom LIKE '%$nom%' ");

      }

  ?>
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
                  <header class="py-5 bg-light border-bottom mb-4">
                    <div class="container">
                        <div class="text-center my-5">
                            <h1 class="fw-bolder">voici les resultats pour votre recherche "<?= $nom?>"</h1>
                        </div>
                    </div>
                  </header>
          <div class="container">
            <div class="row">
  
<?php
  // session_start();
  // require_once 'bdd.php';
  // require_once 'unacces.php';

  //   if(isset($_GET['nome'])){
  //   $nom = $_GET['nome'];
  //   echo "voici les resultats pour la recherche $nom";

  //   $req = $BDD->query("SELECT * FROM recettes WHERE nom = '$nom' ");

  ?><ul  class="col-lg-8"><?php
      while($r = $req->fetch()){ ?>
        <li>
                    <div >
                        <!-- Featured blog post-->
                        <div class="card mb-4">
                            <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>"><img class="card-img-top" src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" alt="..."></a>
                            <div class="card-body">
                                <div class="small text-muted">29 août 2023</div>
                                <h2 class="card-title"><?= $r['nom']?></h2>
                                <p class="card-text"><?= $r['intro']?></p>
                                <a class="btn btn-primary" href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">Read more →</a>
                            </div>
                        </div>
                    </div>
        </li>
        <?php }
        ?>
    </ul>
                    <div class="col-lg-4">
                    <!-- Search widget-->
                    <div class="card mb-4"  style="position: sticky; top : 100px;">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <form action="recherche_utilisateur.php" method="get" >
                                <input class="form-control" name="nome" type="text" id="search-user" placeholder="search a recipe    " aria-describedby="button-search" required>
                                <input class="btn btn-primary" type="submit" value="search">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Categories widget-->
                    <div class="card mb-4" style="position: sticky; top : 295px;">
                        <div class="card-header">Categories</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="categorie.php?id=1">Entré</a></li>
                                        <li><a href="categorie.php?id=2">Plat</a></li>
                                        <li><a href="categorie.php?id=3">Dessert</a></li>
                                    </ul>
                                </div>
                                <div class="col-sm-6">
                                    <ul class="list-unstyled mb-0">
                                        <li><a href="categorie.php?id=4">Apperitif</a></li>
                                        <li><a href="categorie.php?id=5">Autres</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card mb-4" style="position: sticky; top : 480px;">
                        <div class="card-header">Qu'est ce que la page de profile</div>
                        <div class="card-body">les pages de profiles contiennent toutes les recettes publiées par les utilisateur du profil tu peux y retouver les meilleurs comme les pires :) !!
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


    <!-- // while($r = $req->fetch()){ ?>
    //     <li>
        
    //     <a href="post.php?id_recettes_pub=<?= $r['id_recettes_pub']?>">
    //     <img src="asset/.<?= $r['id_recettes_pub'] ?>.jpeg" width=100/> <br>
    //     <?= $r['nom']?>
    //     </a>|
    //     <a href="publication.php?edit=<?= $p['id_recettes_pub']?>" >modifier</a> | <a href="delete.php?id=<?= $p['id_recettes_pub']?>">supprimer</a>
    //     </li>
    
    //     <?php 
    //     }?>

 -->

