<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>
    <h1>Login Page</h1>

    <form action="exec_login.php" method="post">
        <label for="user">User : </label>
        <input type="text" name="user" id="user">
        <br>
        <label for="mdp">Mot de passe : </label>
        <input type="password" name="mdp" id="mdp">
        <br>
        <input type="submit" value="Envoyer"> 
    </form>

    <h3>Don't have account ?</h3>
    <br>
    <h4>Create account : </h4>

    <form action="exec_inscription.php" method="post">
        <label for="id">Username : </label>
        <input type="text" name="users" id="user">
        <br>
        <label for="mdp">Password : </label>
        <input type="password" name="mdps" id="mdp">
        <br>
        <label for="pseudo">Pseudo : </label>
        <input type="text" name="pseudo" id="pseudo">
        <br>
        <input type="submit" value="Envoyer">
    </form>
</body>
</html>