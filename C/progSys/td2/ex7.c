#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct Personne{
    char* nom;
    char* prenom;
    int age;
}Personne;

typedef struct Etudiant{
    int matricule;
    int* notes;
    Personne etudiant;
}Etudiant;

int main(void) {
    int nombreEtudiants = 3;
    Etudiant* tableauEtudiants = malloc(sizeof(Etudiant) * nombreEtudiants);

    tableauEtudiants[0].matricule = 1;
    tableauEtudiants[0].etudiant.nom = "Lemercier";
    tableauEtudiants[0].etudiant.prenom = "Thibault";
    tableauEtudiants[0].etudiant.age = 20;
    tableauEtudiants[0].notes = malloc(sizeof(int) * 10);
    tableauEtudiants[0].notes[0] = 10;

    printf("Informations du premier étudiant:\n");
    printf("Matricule: %d\nNom: %s\nPrenom: %s\nAge: %d\nNotes: %d\n\n",
           tableauEtudiants[0].matricule, tableauEtudiants[0].etudiant.nom,
           tableauEtudiants[0].etudiant.prenom, tableauEtudiants[0].etudiant.age,
           *tableauEtudiants[0].notes);

    free(tableauEtudiants[0].notes);
    free(tableauEtudiants);

    return 0;
}
