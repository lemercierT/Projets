#include <stdlib.h>
#include <stdio.h>
#include <unistd.h>

int main(){

    printf("\nGID :%d", getgid());
    printf(" UID : %d", getuid());

    return 0;
}