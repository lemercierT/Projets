#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void inverse_nombre(int* a, int* b){
    int temp = 0;
    temp = *a;
    *a = *b;
    *b = temp;
}

void inverse_chaine(char** chaine){
    char temp_chaine[] = "";
    char temp[] = "";
    strcpy(temp_chaine, *chaine);
    for(int i = 0; i < 20; i++){
        *temp = temp_chaine[i];
        temp_chaine[i] = temp_chaine[i + 1];
        temp_chaine[i + 1] = *temp;
    }

    *chaine = temp_chaine;
} 

int main(){
    int a = 1;
    int b = 2;
    char* chaine = {"abcdefghiklmnopqrstuvwxyz"};
    int taille = strlen(chaine);

    for(int i = 0; i < taille; i++){
        printf("%c", chaine[i]);
    }
    printf("\n");

    inverse_chaine(&chaine);

    for(int i = 0; i < taille; i++){
        printf("%c", chaine[i]);
    }
    printf("\n");

    printf("%c", chaine[1]);

    printf("AVANT : a = %d et b = %d\n", a, b);

    inverse_nombre(&a, &b);

    printf("APRES : a = %d et b = %d", a, b);
}