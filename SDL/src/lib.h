#ifndef LIB_H_
#define LIB_H_

#include <SDL2/SDL_ttf.h>		//Inclusion des librairies
#include <SDL2/SDL_image.h>
#include <SDL2/SDL.h>
#include <stdio.h>
#include <stdlib.h>

#define TMIN 0			// Valeur min de la position du tableau
#define TMAX 500		// Valeur max de la position du tableau
#define TCASE 50		// Taille des cases du tableau
#define MTCASE TCASE/2  // La moitie d'une cases du tableau

typedef struct Dimension
{
  int w;
  int h;
} Str_dim;

typedef struct Position
{
  int x;
  int y;
} Str_pos;

void SDL_ExitWithError(const char *text);
int display_tabjeu(SDL_Renderer *r);
int display_texture(SDL_Renderer *r,SDL_Texture *t, int x, int y);
int display_textureP(SDL_Renderer *r,SDL_Texture *t, int x, int y);

#endif