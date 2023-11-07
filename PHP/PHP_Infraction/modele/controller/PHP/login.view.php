<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../vue/login.css">
    <title>Page de connexion</title>
</head>
<body>
    <div class="title_login">
        <h3>Connexion Infraction</h3>
    </div>

    <div class="login_form">
        <h5>Formulaire de connexion</h5>
        <form action="Login.php" method="post">
            <label for="num_permis">Numéro de permis :</label>
            <input type="text" name="num_permis" id="num_permis">
            <label for="password">Mot de passe : </label>
            <input type="password" name="password" id="password">
            <input type="submit" value="Se Connecter">
        </form>
    </div>
</body>
</html>