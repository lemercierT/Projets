#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void){
    unsigned short int ligne, colonne;
    int* tab;

    tab = malloc(sizeof(int) * ligne);
    puts("saisir nombre de ligne :");
    scanf("%hu", &ligne);
   
    printf("%lu\n", sizeof(tab));

    return 0;
}