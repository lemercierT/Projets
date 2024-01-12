#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void echange_valeurs(int* a, int* b){
    int temp;
    temp = *a;
    *a = *b;
    *b = temp;
}

int main(void){
    int a = 10, b = 20;
    printf("a: %d | b: %d", a, b);
    echange_valeurs(&a, &b);
    printf("a: %d | b: %d", a, b);

    return 0;
}