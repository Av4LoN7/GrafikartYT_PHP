<?php
// exo : creer un cookie contenant la date de naissance de l'utilsateur et afficher le contenu de la page si celui ci à plus de 20 ans
if(isset($_GET['action']) && $_GET['action'] === "deco") {
    setcookie("naissance", "", -10);
}
if(isset($_POST['submit'])) {
    $dateDeNaissance = $_POST['annee'] .'-'. $_POST['mois'] .'-'. $_POST['jour'];
    setcookie("naissance", $dateDeNaissance);
    header('location:profile.php', true, 303);
    exit;
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>profile</title>
</head>
<body>
<?php if(!empty($_COOKIE['naissance'])): ?>
    <a href="profile.php?action=deco"> se deco</a>
        <?php $interval = date_diff(new DateTime(), new DateTime($_COOKIE['naissance']));
            if($interval->y >= 20): ?>
                <div class="alert alert-success"> Bienvenu à vous </div>
            <?php else: ?>
                <div class="alert alert-danger"> Bonjour, vous n'etes pas autorisé à acceder à ce contenu</div>
            <?php endif; ?>
<?php else: ?>
    <form action="" method="POST" class="form-inline">
        <div class="form-group">
            <input class="form-control" type="text" name="jour">
            <input class="form-control" type="text" name="mois">
            <select name="annee" id="">
                <?php for($i = 1919; $i < 2011; $i++) : ?>
                    <option value="<?= $i ?>"> <?= $i ?> </option>
                <?php endfor; ?>
            </select>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">envoyer </button>
    </form>
<?php endif; ?>
</body>
</html>
