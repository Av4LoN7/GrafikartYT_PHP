<?php
// afficher le nombre de fois où la page à été vue par l'utilisateur (via un refresh par exemple)
// le compteur est enregistré dans un fichier sur l'ordinateur

define("COMPTEUR_LOCATION", "compteur.txt");

function creerOuAjouterVue() {
    $count = 1;
    if(file_exists(COMPTEUR_LOCATION)) {
        $count = file_get_contents(COMPTEUR_LOCATION);
        $count++;
    }
    file_put_contents(COMPTEUR_LOCATION, $count);
}

function recupererCompteur() {
    return file_get_contents(COMPTEUR_LOCATION);
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compteur</title>
</head>
<body>
<h1>Compteur de vue</h1>
    <h2>Nombre de vue de la page :</h2>
    <?php
        creerOuAjouterVue();
    ?>
    <p>La page à été vue : <?= recupererCompteur(); ?> de fois</p>
</body>
</html>
