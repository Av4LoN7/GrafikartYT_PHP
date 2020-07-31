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
require 'templates' . DIRECTORY_SEPARATOR . 'header.php';
?>
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
<?php require 'templates' . DIRECTORY_SEPARATOR . 'footer.php'; ?>
