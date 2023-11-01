#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Personne{
    char* nom;
    char* prenom;
    int age;
}personne;

typedef struct Etudiant{
    int matricule;
    int* notes;
    struct Personne etudiant;
}etudiant;

int main(void){
    struct Etudiant thibault;
    int* array_notes; 
    thibault.matricule = 1;
    thibault.etudiant.nom = "Lemercier";
    thibault.etudiant.prenom = "Thibault";
    thibault.etudiant.age = 20;
    thibault.notes = malloc(sizeof(int) * 10);
    thibault.notes[0] = 10;

    printf("matricule: %d\nnom: %s\nprenom: %s\nage: %d\nnotes: %d\n", thibault.matricule, thibault.etudiant.nom, thibault.etudiant.prenom, thibault.etudiant.age, *thibault.notes);
}