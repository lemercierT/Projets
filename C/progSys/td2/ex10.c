#include <stdio.h>
#include <stdlib.h>

struct Adresse{
    char* rue;
    char* ville;
    int codePostal;
}Adresse;

struct Personne{
    char* nom;
    int age;
    struct Adresse adresse; 
}Personne;

int main(){
    struct Personne personne1;

    personne1.nom = "Lemercier";
    personne1.age = 20;
    personne1.adresse.rue = "Rue Principale";
    personne1.adresse.ville = "Metz";
    personne1.adresse.codePostal = 57070;

    printf("\nInformations de la personne :\n");
    printf("Nom : %s\n", personne1.nom);
    printf("Age : %d\n", personne1.age);
    printf("\nAdresse =>\n");
    printf("Rue : %s\n", personne1.adresse.rue);
    printf("Ville : %s\n", personne1.adresse.ville);
    printf("Code postal : %d\n", personne1.adresse.codePostal);

    return 0;
}
