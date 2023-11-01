#include <stdio.h>

int main(){
    int i = 4; double x;

    printf("adresse de i = %p\nadresse de i + 1 = %p\n", (void*)&i, (void*)&i+1);
    printf("adresse de x = %p\nadresse de x + 1 = %p\n", (void*)&x, (void*)&x+1);
}