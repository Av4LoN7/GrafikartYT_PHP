<?php
require 'templates' . DIRECTORY_SEPARATOR . 'header.php';
require 'compteur.php';

if(!isset($_SESSION["valid"]) || $_SESSION["valid"] === false) {
    header('location: connect.php', true, 302);
    exit;
}
// afficher le nombre de vue total // ok
// afficher le nombre de vue du site par année  ok
// lorsque l'on clique sur une année (icone) la liste des mois où le site fut visité s'affiche en dessous ok
// afficher le nombre de visite par jour pour chaque mois enregistré ok
$listViews = getViewsByYear();
$nombreDeVuesTotal = array_pop($listViews);
?>
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

<?php require 'templates' . DIRECTORY_SEPARATOR . 'footer.php'; ?>

