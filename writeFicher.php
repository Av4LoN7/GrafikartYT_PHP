<?php
// ecrire dans un fichier l'adresse email entré par l'utilisateur
session_start();
$error = null;
$email = null;
if(isset($_POST['email']) && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['success'] = null;
    $email = $_POST['email'];
    if(filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = __DIR__ . DIRECTORY_SEPARATOR . 'emails' . DIRECTORY_SEPARATOR . date('Y-m-d') . '.txt';
        if(file_put_contents($file, $email . PHP_EOL, FILE_APPEND)) {
            $email = null;
            $_SESSION['success'] = "email enregistré";
            header('location:writeFichier.php', true, 303);
            exit;
        } else {
            $error = "une erreur est survenue, veuillez nous en excusez";
        }
    } else {
        $error = "email non valide";
    }
}
?>
<!doctype html>
<html lang=fr>
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <title>NewsLetter</title>
</head>
<body>
    <h1>S'incrire à la newsletter </h1>
    <blockquote>
        <p>
        </p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis est iusto magni modi neque numquam praesentium, quae quam quibusdam. Ad consequatur debitis eum iusto magnam minus nemo omnis repellat veritatis!
    </blockquote>

    <?php if($error): ?>
        <div class="alert alert-danger">
            <?= $error ?>
        </div>
    <?php endif; ?>
    <?php if(isset($_SESSION['success'])): ?>
        <div id="success" class="alert alert-success">
            <?= $_SESSION['success'] ?>
        </div>
    <?php endif; ?>
    <form method="POST" action="newsletter.php" class="form-inline">
        <div class="form-group">
            <label for=""> Votre email :</label>
            <input type="email" name="email" class="form-control" value="<?= htmlentities($email) ?>" required>
        </div>
        <button type="submit" class="btn btn-primary"> Envoyer </button>
    </form>
    <script type="text/javascript">
        if(document.getElementById("success")) {
            setTimeout(function() {
                document.getElementById("success").style.display="none";
            }, 3000);
        }
    </script>
</body>
</html>
