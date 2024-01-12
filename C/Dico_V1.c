#include <stdio.h>
#include <stdlib.h>
#include <string.h>

typedef struct charge_utile
{
    char* firstname;
    char* lastname;
    int* postalcode;
    char* surname;
    char* birthdate;
    char* petsname;
    char* sport;
} U;



void charge_variable(char** firstname, char** lastname, int** postalcode, char** surname, char** birthdate, char** petsname, char** sport)
{
    *firstname = malloc(sizeof(char) * 100);
    *lastname = malloc(sizeof(char) * 100);
    *postalcode = malloc(sizeof(int));
    *surname = malloc(sizeof(char) * 100);
    *birthdate = malloc(sizeof(char) * 100);
    *petsname = malloc(sizeof(char) * 100);
    *sport = malloc(sizeof(char) * 100);

    printf("firstname : ");       scanf("%s", *firstname);
    printf("\nlastname : ");      scanf("%s", *lastname);
    printf("\npostal code : ");   scanf("%d", *postalcode);
    printf("\nsurname : ");       scanf("%s", *surname);
    printf("\nbirthdate : ");     scanf("%s", *birthdate);
    printf("\npetsname : ");      scanf("%s", *petsname);
    printf("\nsport : ");         scanf("%s", *sport);
}

void nom_prenom(char* nom, char* prenom, char** result){
    *result = malloc(sizeof(char) * 100);
    strcpy(*result, nom);
    strcat(*result, prenom);
}

void nom_prenom_post(char* nom, char* prenom, int* poste, char** result){
    char* temp;
    *result = malloc(sizeof(char) * 100);
    temp = malloc(sizeof(char) * 100);
    strcpy(*result, nom);
    sprintf(temp, "%d", *poste);
    strcat(*result, temp);
}

int main(int argc, char** argv)
{
    U all;
    char* result = NULL;

    printf("WELCOME TO CREATE YOUR OWN LIST :\n");
    printf("ENTER : firstname, lastname, entirename, surname, birthdate, petsname, sport\n");
    charge_variable(&all.firstname, &all.lastname, &all.postalcode, &all.surname, &all.birthdate, &all.petsname, &all.sport);

    printf("Firstname: %s\n", all.firstname);
    printf("Lastname: %s\n", all.lastname);
    printf("Postal Code: %d\n", *all.postalcode);
    printf("Surname: %s\n", all.surname);
    printf("Birthdate: %s\n", all.birthdate);
    printf("Petsname: %s\n", all.petsname);
    printf("Sport: %s\n", all.sport);

    nom_prenom(all.firstname, all.lastname, &result);
    printf("%s", result);
    nom_prenom_post(all.firstname, all.lastname, all.postalcode, &result);
    printf("\n%s\n%s", result, result+1);

    free(all.firstname);
    free(all.lastname);
    free(all.postalcode);
    free(all.surname);
    free(all.birthdate);
    free(all.petsname);
    free(all.sport);

    return 0;
}
