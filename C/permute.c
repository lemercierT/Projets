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

void permute(char* a, int l, int r, char** results, int* count)
{
    int i;
    if (l == r)
    {
        results[*count] = malloc(sizeof(char) * 100);
        strcpy(results[*count], a);
        (*count)++;
    }
    else
    {
        for (i = l; i <= r; i++)
        {
            char temp = a[l];
            a[l] = a[i];
            a[i] = temp;

            permute(a, l + 1, r, results, count);

            temp = a[l];
            a[l] = a[i];
            a[i] = temp;
        }
    }
}

void generate_permutations(char* str, char** results, int* count)
{
    int len = strlen(str);
    permute(str, 0, len - 1, results, count);
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

    int count = 0;
    char** permutations = malloc(sizeof(char*) * 1000);

    // Générer toutes les permutations possibles pour les noms, prénoms et codes postaux
    generate_permutations(all.firstname, permutations, &count);
    generate_permutations(all.lastname, permutations, &count);
    generate_permutations(all.surname, permutations, &count);
    char postal_str[20];
    sprintf(postal_str, "%d", *all.postalcode);
    generate_permutations(postal_str, permutations, &count);

    // Afficher les permutations
    printf("\nToutes les permutations possibles :\n");
    for (int i = 0; i < count; i++)
    {
        printf("%s\n", permutations[i]);
        free(permutations[i]);
    }

    free(permutations);

    free(all.firstname);
    free(all.lastname);
    free(all.postalcode);
    free(all.surname);
    free(all.birthdate);
    free(all.petsname);
    free(all.sport);

    return 0;
}
