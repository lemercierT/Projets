<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
$serveur = "localhost";
$utilisateur = "root"; 
$motdepasse = ""; 
$base_de_donnees = "restaurant_admin"; 

$connexion = new mysqli($serveur, $utilisateur, $motdepasse, $base_de_donnees);

if ($connexion->connect_error) {
    die("Erreur de connexion à la base de données : " . $connexion->connect_error);
}

$resultat = $connexion->query("SELECT * FROM usager");
if ($resultat->num_rows > 0) {
    while ($ligne = $resultat->fetch_assoc()) {
        foreach ($ligne as $cle => $valeur) {
            echo "Clé : " . $cle . ", Valeur : " . $valeur . "<br>";
        }
    }
} else {
    echo "Aucun résultat trouvé.";
}

echo "<br>----------------------------------<br><br>";

$requete1 = $connexion->query("SELECT nom, num_carte FROM usager");
if ($requete1->num_rows > 0) {
    while ($ligne = $requete1->fetch_assoc()) {
        $nom = $ligne['nom'];
        $num_carte = $ligne['num_carte'];
        echo " Nom : ".$nom."<br>Num carte : ".$num_carte;
    }
} else {
    echo "Aucun résultat trouvé.";
}
echo "<br>----------------------------------<br><br>";

$res = exec("cd /var/html; pwd; ls -la; cat monsite.php");
echo $res;

echo "<br>----------------------------------<br><br>";

$db_name = "Pierre L.";
$requete2 = $connexion->query("SELECT nom FROM usager WHERE usager.nom = '$db_name'");
if($requete2->num_rows > 0){
    while($ligne = $requete2->fetch_assoc()){
        $nom = $ligne["nom"];
        echo "nom : ".$nom;
    }
}
$connexion->close();
?>
</body>
</html>