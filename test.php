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
        <link href="css/styles.css" rel="stylesheet">
    </head>
    <body>
    <?php
session_start();
require_once 'bdd.php';
require_once ('unacces.php') ;
$publications = $BDD->query('SELECT * FROM recettes WHERE id_user_mail = "'.$_SESSION['mail'].'" ORDER BY id_recettes_pub DESC ');
$tests = $BDD->query('SELECT *  FROM users where mail = "'.$_SESSION['mail'].'" ');

$username_u = $tests->fetch();   
$username = $username_u['username'];   


if ($_SESSION['mail'] == FALSE  ) {

    header("Location: index.php");
}


?>
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#!">Cook'nShare</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link" href="main.php">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="Profile.php">Profile</a></li>
                        <li class="nav-item"><a class="nav-link" href="#!">friends</a></li>
                        <li class="nav-item"><a class="nav-link" href="publication.php">post</a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">vous êtes sur le profil de <?= $username?> !</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <ul  class="col-8">
                <?php while($p = $publications->fetch()){ ?>
                <li>
                <div >
                    <!-- Featured blog post-->
                    <div class="card mb-4">
                        <a href="post.php?id_recettes_pub=<?= $p['id_recettes_pub']?>"><img class="card-img-top" src="asset/.<?= $p['id_recettes_pub'] ?>.jpeg" alt="..."></a>
                        <div class="card-body">
                            <div class="small text-muted">29 août 2023</div>
                            <h2 class="card-title"><?= $p['nom']?></h2>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis aliquid atque, nulla? Quos cum ex quis soluta, a laboriosam. Dicta expedita corporis animi vero voluptate voluptatibus possimus, veniam magni quis!</p>
                            <a class="btn btn-primary" href="post.php?id_recettes_pub=<?= $p['id_recettes_pub']?>">Read more →</a>
                        </div>
                    </div>
                </div>
                </li>
                    <?php }?>  
                </ul>
                

                <!-- Side widgets-->
                <div class="col-4">
                    <!-- Search widget-->
                    <div class="card mb-4">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <form action="recherche_utilisateur.php" method="get">
                                <input class="form-control" name="nome" type="text" id="search-user" placeholder="search a recipe    " aria-describedby="button-search" >
                                <input class="btn btn-primary" type="submit" value="search">
                                </form>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Categories widget-->
                    <div class="card mb-4">
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
                    <div class="card mb-4">
                        <div class="card-header">L'ambition de Cook'nShare</div>
                        <div class="card-body">Cook'nShare est un site dédier à la cuisine où tu peux partager n'importe quel recette en quelques cliques, mais aussi en découvrir du monde entier
                            faite par des personnes comme toi vennant des 4 coins de la planete :)
                        </div>
                    </div>
                </div>
            </div>
        </div>
</html>
