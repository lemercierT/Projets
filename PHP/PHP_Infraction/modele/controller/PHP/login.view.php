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
    <link rel="stylesheet" href="../vue/login.view.css">
    <title>Page de connexion</title>
</head>
<body>
    <div class="title_login">
        <h3>Connexion Infraction</h3>
        <h5>Formulaire de connexion</h5>
        <form action="Login.php" method="post">
            <label for="num_permis" id="num_permis">Numéro de permis :</label>
            <input type="text" name="num_permis" id="num_permis" value="">
            <br>
            <label for="password" id="password">Mot de passe : </label>
            <input type="password" name="password" id="password" value="">
            <div class="error" hidden>
                <p>*Numéros de permis ou mot de passe incorrect, veuillez réessayer</p>
            </div>
            <br>
            <button type="submit" id="submit">Se connecter</button>
        </form>
    </div>
</body>
<script src="login.js"></script>
</html>