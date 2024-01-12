#include <stdio.h>
#include <stdlib.h>

void AffiTab(int tab[6][6]){

int li;
int co;
int j;
int i;



    printf("Veuillez saisir le nombre de ligne : ");
    scanf("%d", &li);
    printf("Veuillez saisir le nombre de colonne : ");
    scanf("%d", &co);


    for (j = 0; j < li; j++)
    {
        printf(" -----------------------------\n ");
        printf(" | ");
        for (i = 0; i < co; i++)
        {
            printf(" %d ", tab[j][i]);
            printf(" | ");
        }
            printf("\n");
    }

            printf("-----------------------------\n");

            printf("\n");
    
}

void InitTab(int tab[6][6]){

    for (int j = 0; j <= 7; j++)
    {
        for (int i = 0; i <= 7; i++)
        {
            tab[j][i] = 0;
        }
        
    }
    
}

void Jeton(){

    int nbj1, nbj2;
    int li;
    int co;

    nbj1 = ((li * co) - 1) / 2;
    nbj2 = (((li * co) - 1) / 2) * (-1);
    
    printf("(J1) Vous avez %d jetons.\n", nbj1);
    printf("(J2) Vous avez %d jetons.\n", nbj2);

}

void RemplirTab(int tab[6][6]){

    int li;
    int co;
    int nbj1, nbj2;
    int n;
    int l1, c1, l2, c2;

    printf("%d", li);

    n = ((li * co) * (-1)) - 1;

    printf("la valeur de %d par %d vaut %d\n", li, co, n);

    for (int i = 0; i < n; i++)
    {
        printf("Tour du joueur 1 : \n");
        printf("Veuillez saisir le numero de ligne ou placer votre jeton : ");
        scanf("%d", &l1);
        printf("Veuillez saisir le numero de colonne ou placer votre jeton : ");
        scanf("%d", &c1);

        tab[l1][c1] = nbj1;
        nbj1 = nbj1 - 1;

        

        printf("Tour du joueur 2 :\n");
        printf("Veuillez saisir le numero de ligne ou placer votre jeton : ");
        scanf("%d", &l2);
        printf("Veuillez saisir le numero de colonne ou placer votre jeton : ");
        scanf("%d", &c2);

        tab[l2][c2] = nbj2;
        nbj2 = nbj2 +1;
        

    }

}


int main(){

int tabentier[6][6];
int nbj1, nbj2;

    InitTab(tabentier);
    AffiTab(tabentier);
    Jeton();
    RemplirTab(tabentier);

    
}