#include <stdio.h>
#include <stdlib.h>

struct Noeud{
    int donnee;
    struct Noeud* suivant;
};

void ajouterEnFin(struct Noeud** tete, int donnee){
    struct Noeud* nouveauNoeud = (struct Noeud*)malloc(sizeof(struct Noeud));
    nouveauNoeud->donnee = donnee;
    nouveauNoeud->suivant = NULL;

    if (*tete == NULL){
        *tete = nouveauNoeud;
        return;
    }

    struct Noeud* dernier = *tete;
    while (dernier->suivant != NULL){
        dernier = dernier->suivant;
    }

    dernier->suivant = nouveauNoeud;
}

void afficherListe(struct Noeud* tete){
    while (tete != NULL) {
        printf("%d -> ", tete->donnee);
        tete = tete->suivant;
    }
    printf("NULL\n");
}

int main() {
    struct Noeud* maListe = NULL;

    ajouterEnFin(&maListe, 1);
    ajouterEnFin(&maListe, 2);
    ajouterEnFin(&maListe, 3);
    ajouterEnFin(&maListe, 4);
    ajouterEnFin(&maListe, 5);

    printf("Liste : ");
    afficherListe(maListe);

    return 0;
}
