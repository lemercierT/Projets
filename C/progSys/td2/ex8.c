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
    void* notes;
    Personne etudiant;
}Etudiant;

Etudiant modifierEtudiant(Etudiant etudiant, int nouvelleNote){
    ((int*)etudiant.notes)[0] = nouvelleNote;
    return etudiant;
}

int main(void){
    Etudiant thibault;
    int* array_notes;
    thibault.matricule = 1;
    thibault.etudiant.nom = strdup("Lemercier");
    thibault.etudiant.prenom = strdup("Thibault");
    thibault.etudiant.age = 20;
    thibault.notes = malloc(sizeof(int) * 10);

    array_notes = (int*)thibault.notes;
    array_notes[0] = 10;

    printf("Informations avant modification :\n");
    printf("Matricule: %d\nNom: %s\nPrenom: %s\nAge: %d\nNotes: %d\n\n",
           thibault.matricule, thibault.etudiant.nom,
           thibault.etudiant.prenom, thibault.etudiant.age,
           array_notes[0]);

    thibault = modifierEtudiant(thibault, 15);

    printf("Informations après modification :\n");
    printf("Matricule: %d\nNom: %s\nPrenom: %s\nAge: %d\nNotes: %d\n\n",
           thibault.matricule, thibault.etudiant.nom,
           thibault.etudiant.prenom, thibault.etudiant.age,
           array_notes[0]);

    free(thibault.etudiant.nom);
    free(thibault.etudiant.prenom);
    free(thibault.notes);

    return 0;
}
