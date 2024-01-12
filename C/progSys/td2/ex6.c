#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Personne{
    char* nom;
    char* prenom;
    int age;
}Personne;

int main(void){
    struct Personne thibault;
    thibault.nom = "Lemercier";
    thibault.prenom = "Thibault";
    thibault.age = 20;

    printf("nom: %s\nprenom: %s\nage: %d\n", thibault.nom, thibault.prenom, thibault.age);
}