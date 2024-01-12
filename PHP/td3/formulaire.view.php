<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FORMULAIRE</title>
</head>
<body>
<link rel="stylesheet" type="text/css" href="./formulaire.css">
    <section class="all">
        <form action="formulaire.php" method="post">
            <div class="saisie_pdata">
                <h2>Formulaire de saisie</h2>
                <label for="nom">NOM : </label>
                <input type="text" name="nom" id="id_nom" required>
                <label for="prenom">Prénom : </label>
                <input type="text" name="prenom" id="id_prenom" required>
                <label for="age">Age : </label>
                <input type="text" name="age" id="id_age" required>
                <label for="genre">Genre : </label>
                <label for="feminin">Feminin</label>
                <input type="radio" name="feminin" id="id_fem">

                <label for="masculin">Masculin</label>
                <input type="radio" name="masculin" id="id_mal">

                <label for="autre">Autre</label>
                <input type="radio" name="autre" id="id_autre">
            </div>
            <div class="competences">
                <h2>Compétences dans les langages informatiques</h2>
                <label for="c">C</label>
                <input type="checkbox" name="c" id="id_c">

                <label for="java">C</label>
                <input type="checkbox" name="java" id="id_java">

                <label for="ts">Typescript</label>
                <input type="checkbox" name="ts" id="id_ts">

                <label for="php">PHP</label>
                <input type="checkbox" name="php" id="id_php">

                <label for="cpp">C++</label>
                <input type="checkbox" name="cpp" id="id_cpp">

                <label for="cobol">Cobol</label>
                <input type="checkbox" name="cobol" id="id_cobol">

                <label for="aucun">Aucun</label>
                <input type="checkbox" name="aucun" id="id_aucun">
            </div>
            <div class="langues">
                <h2>Langue maternelle</h2>
                <label for="langue_maternelle">Langue maternelle</label>
                <select name="langue_maternelle" id="langue_maternelle" required>
                <option value="fr">Français</option>
                <option value="en">Anglais</option>
                <option value="esp">Espagnol</option>
                </select>
            </div>
            <div class="sub">
            <input type="submit" value="Envoyer">
            <input type="submit" value="Annuler">
            <input type="submit" value="Ré-initialisez">
            </div>
        </form>
    </section>
</body>
</html>