#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#define SIZE 10;

typedef struct tab{
    int li;
    int co;
}tab;

void verif_tab(int* li, int* co){
    if(*li > 10 || *co > 10) printf("line or columns aren't accepted, please restart.");
}

void ask_tab(int* li, int* co){
    printf("please enter the size for line : ");
    scanf("%d", &*li);
    while(getchar() != '\n'){}
    printf("please enter the size for columns : ");
    scanf("%d", &*co);
    while(getchar() != '\n');
}

void init_tab(int** tab, int* li, int* co){
    ask_tab(li, co);
    tab = malloc(sizeof(int) * *li);
    for(int i = 0; i < *li; i++){
        for(int y = 0; y < *co; y++){
            tab[i][y] = 1;
        }
    }
}

void create_tab(int** tab, int* li, int* co){
    init_tab(tab, li, co);
    for(int i = 0; i < *li; i++){
        printf("-");
        for(int y = 0; y < *co; y++){
            printf("|");
        }
    }
}

int main(){
    tab T;
    int** tab;
    tab = malloc(sizeof(int) * T.li);
    create_tab(tab, &T.li, &T.co);

    free(tab);
    return 0;
}