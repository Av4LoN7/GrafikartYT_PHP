<?php
require 'compteur.php';
// afficher le nombre de vue total // ok
// afficher le nombre de vue du site par année  ok
// lorsque l'on clique sur une année (icone) la liste des mois où le site fut visité s'affiche en dessous ok
// afficher le nombre de visite par jour pour chaque mois enregistré ok
$listViews = getViewsByYear();
$nombreDeVuesTotal = array_pop($listViews);
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        .dropdown-toggle::after {
            transform: translateY(-50%);
        }
    </style>
    <title>Dashboard</title>
</head>
<body>
<div class="container">
    <h1>DashBoard</h1>
    <div class="jumbotron">
        <h2>Nombre de vue total : <?= $nombreDeVuesTotal; ?> </h2>
    </div>
    <div class="wrapper">
        <nav>
            <ul class="list-unstyled">
                <?php foreach ($listViews as $k => $views): ?>
                    <li> <?= $k; ?> : <?= $views; ?> vues sur l'année
                        <a href="#subMenu<?=$k;?>" aria-expanded="false" class="dropdown-toggle" data-toggle="collapse"></a>
                        <ul id="subMenu<?=$k;?>" class="collapse list-unstyled">
                            <li><?= getViewsByMonth($k); ?></li>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>
