#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main(void){
    int nombre = 10;
    printf("avant echange: %d\n", nombre);
    *&nombre = 15;
    printf("apres echange: %d\n", nombre);
}