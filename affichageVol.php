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
    <title>Air -ISEN · Bootstrap</title>n
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
    <div class="container col-md-8">';

readFlights();
echo '</div>
<div style="border-left:1px solid darkgrey;height:352px"></div>
    <div class="col">
        <div class="card" style="height: 353px">
        </div>
    </div>
</main>
</body>
</html>';

?>