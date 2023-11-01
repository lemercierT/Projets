#include <stdio.h>
#include <stdlib.h>
#include <string.h>

char** split_string(const char* str, const char* delimiter, int* num_tokens) {
    // Copie de la chaîne d'origine pour éviter de la modifier
    char* temp_str = strdup(str);

    // Allocation initiale de mémoire pour le tableau de pointeurs
    int max_tokens = 10;
    char** tokens = (char**)malloc(sizeof(char*) * max_tokens);

    // Obtention du premier jeton
    char* token = strtok(temp_str, delimiter);
    int count = 0;

    // Tant qu'il y a des jetons, les stocker dans le tableau de pointeurs
    while (token != NULL) {
        tokens[count] = strdup(token);
        count++;

        // Vérification de la taille du tableau et réallocations si nécessaire
        if (count >= max_tokens) {
            max_tokens += 10;
            tokens = (char**)realloc(tokens, sizeof(char*) * max_tokens);
        }

        // Obtention du jeton suivant
        token = strtok(NULL, delimiter);
    }

    // Affectation du nombre de jetons à la variable num_tokens
    *num_tokens = count;

    // Libération de la mémoire temporaire
    free(temp_str);

    return tokens;
}

int main() {
    const char* str = "Hello,world,this,is,a,test";
    const char* delimiter = ",";

    int num_tokens = 0;
    char** tokens = split_string(str, delimiter, &num_tokens);

    for (int i = 0; i < num_tokens; i++) {
        printf("%s\n", tokens[i]);
    }

    // Libération de la mémoire allouée
    for (int i = 0; i < num_tokens; i++) {
        free(tokens[i]);
    }
    free(tokens);

    return 0;
}
