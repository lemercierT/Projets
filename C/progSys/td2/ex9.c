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
    int note;
    Personne etudiant;
}Etudiant;

void trierEtudiants(Etudiant* tableau, size_t taille){
    int i, j;
    Etudiant temp;

    for (i = 1; i < taille; i++){
        temp = tableau[i];
        j = i - 1;

        while (j >= 0 && tableau[j].note < temp.note){
            tableau[j + 1] = tableau[j];
            j = j - 1;
        }

        tableau[j + 1] = temp;
    }
}

int main(void) {
    Etudiant tableauEtudiants[] = {
        {1, 16, {"Lemercier", "Thibault", 20}},
        {2, 20, {"Zampini", "Loïck", 22}},
        {3, 18, {"Kanco", "Abbas", 21}},
    };

    size_t nombreEtudiants = sizeof(tableauEtudiants) / sizeof(Etudiant);

    printf("Avant le tri :\n");
    for (int i = 0; i < nombreEtudiants; ++i){
        printf("Matricule: %d, Note: %d\n", tableauEtudiants[i].matricule, tableauEtudiants[i].note);
    }

    trierEtudiants(tableauEtudiants, nombreEtudiants);

    printf("\nAprès le tri :\n");
    for (int i = 0; i < nombreEtudiants; ++i){
        printf("Matricule: %d, Note: %d\n", tableauEtudiants[i].matricule, tableauEtudiants[i].note);
    }

    return 0;
}