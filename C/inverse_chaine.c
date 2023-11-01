#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void inverse_alphabet(char** alpha){
    int size = strlen(*alpha);
    char array_temp[size];
    printf("ARRAY SIZE : %d\n", size);

    strcpy(array_temp, *alpha);
    printf("%s\n", array_temp);

    char temp;
    for (int i = 0; i < size / 2; i++) {
        temp = array_temp[i];
        array_temp[i] = array_temp[size - i - 1];
        array_temp[size - i - 1] = temp;
    }

    *alpha = array_temp;
}

int main(void){
    char* alphabet = {"abcdefghijklmnopqrstuvwxyz"};
    inverse_alphabet(&alphabet);
    printf("%s\n", alphabet);
}
