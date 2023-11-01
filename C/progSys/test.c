#include <stdio.h>
#include <stdlib.h>

int addition(int first, int second){
    return first + second;
}

int main(int argc, char** argv){
    char* nom = "lemercier";
    int res = 0;
    printf("%s\n", nom);

    int first = 10, second = 20;

    res = addition(first, second);

    return 0;
}