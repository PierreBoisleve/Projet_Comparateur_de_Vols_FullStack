<?php
include 'controller.php';
require_once 'connexpdo.php';

$year = date("Y");
$today = date("Y-m-d");
$year1 = $year-4;
$date = date ($year1."-m-d");

echo '<!doctype html>
<html lang="fr" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Air ISEN · Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="CSS/style.css" rel="stylesheet">
    <link rel="icon" type="image/png" href="IMG/airplane-flight-around-the-planet.png" />
</head>
<body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm justify-content-between">
        <a id="mainTitle" class="navbar-brand" href="index.php" title="Accueil">
        <img src="IMG/airplane-flight-around-the-planet.svg" alt="Icone Air ISEN" style="width: 50px">
        &nbsp;Air ISEN Search</a>        
        <div style="float: right">
            <a class="navbar-brand" href="connexion.php"><button type="button" class="btn btn-outline-white ">Connexion</button></a>
            <a class="navbar-brand" href="admin/affichageAdmin.php"><button type="button" class="btn btn-outline-white">Admin</button></a>
        </div>
    </nav>
</header>
<img src="IMG/panorama.jpg" class="img-fluid" alt="Responsive image" style="max-width: 100%; height: auto;">
<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container col-md-9">
        <h1 id="mainIntro" class="display-4 text-center">Connectez-Vous</h1>
        <br><br>
        <div class="row">
            <div class="col col-md-8">
                <div class="card">
                    <div class="card-body">
                        <form action="controller.php?func=connectUser" method="POST">
                            <div class="form-group col-md-6">
                                 Email
                                 <input type="text" class="form-control" name="userMail" autocomplete="off" placeholder="Votre adresse mail" required>
                            </div>
                            <div class="form-group col-md-6">
                                 Date de Naissance
                                 <input type="date" class="form-control" max="' .$today.'" name="birthDate" required>
                            </div><br>
                            <button style="margin-left:2%; width: 25%" type="submit" class="btn btn-outline-white">Connexion</button>                        
                        </form>
                    </div>
                </div>
            </div>';
            echo '
            <div style="border-left:1px solid darkgrey;height:352px"></div>
            <div class="col">
                <div class="card" style="height: 352px">
                <iframe src="https://fr.euronews.com/embed/timeline" scrolling="no" style="border:none; min-height:425px; width:100%; height:100%;"></iframe>
                </div>
            </div>
        </div>
     <br>
</form>
    </div>
    <br>
    <br>
    <br>
</main>
</body>
<footer class="footer mt-auto py-3 bg-white border-top shadow-sm">
    <div class="container">
        <span class="text-muted">Développé par Pierre, Hugo, Tristan, Eloi @ 2020</span>
    </div>
</footer>
</html>';