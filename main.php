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



if ($_SESSION['mail'] == FALSE  ) {

    header("Location: index.php");
}


?>
        <!-- Responsive navbar-->
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
        <!-- Page header with logo and tagline-->
        <header class="py-5 bg-light border-bottom mb-4">
            <div class="container">
                <div class="text-center my-5">
                    <h1 class="fw-bolder">Bienvenu sur Cook'nShare !</h1>
                </div>
            </div>
        </header>
        <!-- Page content-->
        <div class="container">
            <div class="row">
                <!-- Blog entries-->
                <div class="col-lg-8">
                    <!-- Featured blog post-->
                    <div class="card mb-4" >
                        <a href="post.php?id_recettes_pub=43"><img class="card-img-top" src="asset/.43.jpeg" alt="..."></a>
                        <div class="card-body">
                            <div class="small text-muted">29 août 2023</div>
                            <h2 class="card-title">sushi</h2>
                            <p class="card-text">sushi de ouf!!</p>
                            <a class="btn btn-primary" href="post.php?id_recettes_pub=43">Read more →</a>
                        </div>
                    </div>
                    <!-- Nested row for non-featured blog posts-->
                    <div class="row">
                        <div class="col-lg-6" >
                            <!-- Blog post-->
                            <div class="card mb-4" >
                                <a href="post.php?id_recettes_pub=48"><img class="card-img-top" src="asset/.48.jpeg" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted">1 septembre , 2023</div>
                                    <h2 class="card-title h4">tteokbokki</h2>
                                    <p class="card-text">Le tteokbokki est l'un des plats de rue les plus populaires en Corée. La version la plus connue et la plus populaire est celle avec une sauce piquante. Celui-ci est à base de gateaux de riz frit et peuvent être accompagnés de legume comme du kimchi ou alors du radis daikon mariné.</p>
                                    <a class="btn btn-primary" href="post.php?id_recettes_pub=48">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="post.php?id_recettes_pub=42"><img class="card-img-top" src="asset/.42.jpeg" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted">3 septembre, 2023</div>
                                    <h2 class="card-title h4">bubble tea</h2>
                                    <p class="card-text">Le bubble tea ou « thé aux perles » nous vient tout droit de Taïwan ! Presque devenue la boisson nationale du pays depuis les années 80, elle se compose de thé, de perles de tapioca, d’un sirop au parfum de votre choix et peut se déguster soit à l’eau soit au lait, soit en mélangeant subtilement les deux. Une recette facile à réaliser que vous retrouverez ici.</p>
                                    <a class="btn btn-primary" href="post.php?id_recettes_pub=42">Read more →</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="post.php?id_recettes_pub=49"><img class="card-img-top" src="asset/.49.jpeg" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted">5 septembre, 2023</div>
                                    <h2 class="card-title h4">toast de saumon avocat</h2>
                                    <p class="card-text">Rien de mieu pour commencer la journée qu'un bon toast de saumon avocat.</p>
                                    <a class="btn btn-primary" href="post.php?id_recettes_pub=49">Read more →</a>
                                </div>
                            </div>
                            <!-- Blog post-->
                            <div class="card mb-4">
                                <a href="post.php?id_recettes_pub=50"><img class="card-img-top" src="asset/.50.jpeg" alt="..."></a>
                                <div class="card-body">
                                    <div class="small text-muted">5 septembre, 2023</div>
                                    <h2 class="card-title h4">cheesecake oreo</h2>
                                    <p class="card-text">Un cheesecake Oreo sans cuisson, donc facile à refaire à la maison, avec une belle déco ! Les addicts aux oreos vont trouver leur bonheur. Possible aussi de remplacer les oreos par d’autres types de biscuits style speculoos etc. pour adapter la recette.</p>
                                    <a class="btn btn-primary" href="post.php?id_recettes_pub=50">Read more →</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Pagination-->

                </div>
                <!-- Side widgets-->
                <div class="col-lg-4" >
                    <!-- Search widget-->
                    <div class="card mb-4" style="position: sticky; top : 100px;">
                        <div class="card-header">Search</div>
                        <div class="card-body">
                            <div class="input-group">
                                <form action="recherche_utilisateur.php" method="get">
                                <input class="form-control" name="nome" type="text" id="search-user" placeholder="search a recipe    " aria-describedby="button-search" required >
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
                        <div class="card-header">L'ambition de Cook'nShare</div>
                        <div class="card-body">Cook'nShare est un site dédier à la cuisine où tu peux partager n'importe quel recette en quelques cliques, mais aussi en découvrir du monde entier
                            faite par des personnes comme toi vennant des 4 coins de la planete :)
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <footer class="py-5 bg-dark" style="background-color: #6a994e !important;">
            <div class="container"><p class="m-0 text-center text-white">Copyright © CooK'nShare 2023</p></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <script>

    

</body>
</html>

<!-- <?php
session_start();
require_once 'bdd.php';



if ($_SESSION['mail'] == FALSE  ) {

    header("Location: index.php");
}


?> 
        