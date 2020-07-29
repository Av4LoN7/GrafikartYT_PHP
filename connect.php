<?php
require 'auth.php';
if(isset($_GET['invalid_login'])) {
    $error = "le couple identifiant / mot de passe n'est pas valide";
}
if(isset($_GET['invalid_id'])) {
    $error = "votre identifiant ne peux pas être vide";
}
if(isset($_GET['invalid_pass'])) {
    $error = "votre mot de passe ne peux pas être vide";
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
    <title>S'autentifier</title>
</head>
<body>
<div class="container">
    <h1>Connection</h1>
    <form method="POST">
        <div class="form-group">
            <label for="">Identifiant</label>
            <input type="text" class="form-control" name="id">
        </div>
        <div class="form-group">
            <label for="">Mot de passe</label>
            <input type="password" class="form-control" name="mdp">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Envoyer</button>
    </form>
    <?php if(!empty($error)): ?>
        <div class="alert alert-danger">
            <?= $error; ?>
        </div>
    <?php endif; ?>
</div>

</body>
</html>
