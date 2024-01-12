<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vue/login.css"
    <title>Login</title>
</head>
<body>
    <div class="title">
        <h3>Sessions et authentification</h3>
    </div>

    <h4>authentification</h4>
    <form action="login.php" method="post">
    <label for="user">Username: </label>
        <input type="text" name="user" id="user">
        <br>
        <label for="passwd">Password: </label>
        <input type="password" name="passwd" id="passwd">
        <br>
        <input type="submit" value="Connexion">
    </form>
    
</body>
</html>