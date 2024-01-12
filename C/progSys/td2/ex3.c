#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void){
    int ligne, colonne;
    int* tab;

    puts("saisir nombre de ligne :");
    scanf("%d", &ligne);
    tab = malloc(1 * ligne);
   
    for(int i = 0; i < sizeof(tab); i++){
        int value;
        puts("entrer valeur:");
        scanf("%d", &value);
        tab[i] = value;
    }

    for(int i = 0; i < sizeof(tab); i++){
        printf("%d", tab[i]);
    }

    return 0;
}