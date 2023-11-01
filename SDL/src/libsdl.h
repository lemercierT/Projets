#include <SDL.h>
#include <stdio.h>
#include <stdlib.h>

#define TMIN 0			// Valeur min de la position du tableau
#define TMAX 500		// Valeur max de la position du tableau
#define TCASE 100		// Taille des cases du tableau

void SDL_ExitWithError(const char *message[])
{
    SDL_Log("ERREUR : %s > Initialisation %s", message, SDL_GetError());
    SDL_Quit();
    exit(EXIT_FAILURE);
}

void display_tabjeu(SDL_Renderer *r)
{
		if (SDL_SetRenderDrawColor(r,100,200,250,SDL_ALPHA_OPAQUE) != 0) SDL_ExitWithError("Color d'un rendu");
	  for (int i = TMIN; i <= TMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(r,i,TMIN,i,TMAX);
    }
    for (int i = TMIN; i <= TMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(r,TMIN,i,TMAX,i);
    }
}

void display_texture(SDL_Renderer *r,SDL_Texture *t, int x, int y)
{
		SDL_Rect position;
    position.x = x*100+25;
    position.y = y*100+25;
    SDL_QueryTexture(t, NULL, NULL, &position.w, &position.h);
    SDL_RenderCopy(r, t, NULL, &position);
}