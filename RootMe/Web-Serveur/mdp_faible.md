# Mot de passe faible

## Procédure

1. Analyse

Une fenêtre pop-up apparaît et demande un username et un password pour poursuivre.<br>

2. Liste des combinaisons username/password les plus utilisés : 

```
admin
root
toor
password
123456
12345678
1234
qwerty
12345
iloveyou
...
```

3. Exploitation

La bonne combinaison est admin/admin, réponse : 

```
HTTP/1.1 200 OK
Server: nginx
Date: Sat, 06 Jan 2024 13:24:16 GMT
Content-Type: text/html; charset=UTF-8
Last-Modified: Fri, 10 Dec 2021 20:41:01 GMT
Connection: close
Vary: Accept-Encoding
ETag: W/"61b3bb5d-110"
Content-Length: 272

<html>
  <head>
  </head>

  <body>
    <div>
      <br/>
      <h3>Bien joué, vous pouvez utiliser ce mot de passe pour valider le challenge</h3>
      <br/><br/>
      <h3>Well done, you can use this password to validate the challenge</h3>
    </div>
  </body>
</html>
```