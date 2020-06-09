<?php
include 'controller.php';
$depart = $_SESSION['originAirport'];
$arrivee = $_SESSION['destinationAirport'];
$date = $_SESSION['departDate'];
$nbrAdults = $_SESSION['nbrAdultes'];
$nbrEnfants = $_SESSION['nbrEnfants'];
$volDirect = $_SESSION['volDirectCheck'];

echo '<!DOCTYPE html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Air ISEN · Bootstrap</title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Custom styles for this template -->
    <link href="CSS/style.css" rel="stylesheet">
</head><body class="d-flex flex-column h-100">
<header>
    <!-- Fixed navbar -->
    <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white border-bottom shadow-sm">
        <a id="mainTitle" class="navbar-brand" href="index.php">Air ISEN Search</a>
    </nav>
</header>

<!-- Begin page content -->
<main role="main" class="flex-shrink-0">
    <div class="container col-md-9">
        <h1 id="mainIntro" class="display-4 text-center">Vols Disponibles</h1>
        <br><br>
        <div class="row">
    <div class="container col-md-8">';
readFlights();
echo '</div>
<div style="border-left:1px solid darkgrey;height:352px"></div>
    <div class="col">';
                $meteo = "";
                $meteo = "<a target=\"_blank\" href=\"https://hotelmix.fr/weather/nantes-876\"><img src=\"https://w.bookcdn.com/weather/picture/3_876_1_3_e65817_430_ffffff_333333_08488D_1_ffffff_333333_0_6.png?scode=124&domid=581&anc_id=42628\" alt=\"booked.net\"/></a>";
                echo $meteo;
                echo '
    </div>
</main>
</body>
<footer class="footer mt-auto py-3 bg-white border-top shadow-sm">
    <div class="container">
        <span class="text-muted">Place sticky footer content here.</span>
    </div>
</footer>
<script src="JS/test.js"></script>
</html>';

?>