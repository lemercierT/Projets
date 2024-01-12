#include <stdio.h>
#include <stdlib.h>
#include <string.h>

void search_adr_int(int*search){
    printf("l'adresse de cette variable se situe à : %p\n", &search);
}

void search_adr_char(char search){
    printf("l'adresse de cette variable se situe à : %p\n", &search);
}

int main(int argc, char** argv){
    int i = 4; int y = 8;
    double ii = 8; double yy = 16;

    printf("adresse i = %p\n adresse de i+1 = %p | adresse de y = %p\n", &i, &i+1, &y);
    printf("adresse de ii = %p | adresse de yy = %p\n", &ii, &yy);

    int* temp;
    temp = malloc(sizeof(int) * 10);
    printf("adresse de temp = %p\n", &temp);

    printf("addr i = %p | value = %d", &i, i);
    printf("addr i+1 = %p\nvalue = %d\n", &i+1, *((int*)(&i + 1)));

    printf("addr ii = %p\nvalue ii = %f\n", &ii, ii);
    printf("addr ii + 1 = %p\nvalue ii+1 = %lf\n\n", &ii+1, *((double*)(&ii+1)));

    int find = 5; char carac1 = 'a'; char carac2 = 'b';
    search_adr_int(temp);
    search_adr_char(carac1);
    search_adr_char(carac2);

    return 0;
}