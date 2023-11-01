// gcc src/SDL1.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2 -lSDL2_ttf
// gcc src/SDL1.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2 -lSDL2_ttf -mwindows

#include <SDL2/SDL_ttf.h>		//Inclusion des librairies
#include <SDL2/SDL_image.h>
#include <SDL2/SDL.h>
#include <stdio.h>
#include <stdlib.h>

#define TMIN 0			// Valeur min de la position du tableau
#define TMAX 600		// Valeur max de la position du tableau
#define TCASE 100		// Taille des cases du tableau

typedef struct Dimension
{
  int w;
  int h;
} Struct_dim;

void SDL_ExitWithError(const char *text);
void tabjeu(SDL_Renderer *r);
void texture(SDL_Renderer *r, SDL_Texture *t, int x, int y);

int main(int argc, char **argv){

    
    SDL_Window *window = NULL;
    SDL_Renderer *renderer = NULL;
    Struct_dim Window = {801,601};



    if (SDL_Init(SDL_INIT_VIDEO) != 0) SDL_ExitWithError("Initialisation SDL_INIT.");




    window = SDL_CreateWindow("sdlgame", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, Window.w, Window.h, 0);

    if(window == NULL) SDL_ExitWithError("Initialisation fenetre");

    renderer = SDL_CreateRenderer(window, -1, SDL_RENDERER_SOFTWARE);

    if(renderer == NULL) SDL_ExitWithError("Initialisation renderer");

    SDL_RenderPresent(renderer);

    if(SDL_RenderClear(renderer) != 0) SDL_ExitWithError("Initialisation nettoyage renderer");



    SDL_Texture *p = SDL_CreateTexture(renderer, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 51, 51);
    SDL_SetRenderDrawColor(renderer, 0, 255, 255, 255);

    SDL_SetRenderTarget(renderer, p);

    SDL_RenderDrawLine(renderer, 0, 0, 50, 0);
    SDL_RenderDrawLine(renderer, 50, 0, 50, 50);
    SDL_RenderDrawLine(renderer, 50, 50, 0, 50);
    SDL_RenderDrawLine(renderer, 0, 50, 0, 0);

    SDL_SetRenderTarget(renderer, NULL);


    SDL_Texture *p1 = SDL_CreateTexture(renderer, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 51, 51);
    SDL_SetRenderDrawColor(renderer, 255, 255, 0, 255);

    SDL_SetRenderTarget(renderer, p1);

    SDL_RenderDrawLine(renderer, 0, 0, 50, 0);
    SDL_RenderDrawLine(renderer, 50, 0, 50, 50);
    SDL_RenderDrawLine(renderer, 50, 50, 0, 50);
    SDL_RenderDrawLine(renderer, 0, 50, 0, 0);

    SDL_SetRenderTarget(renderer, NULL);



    SDL_Texture *p2 = SDL_CreateTexture(renderer, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 51, 51);
    SDL_SetRenderDrawColor(renderer, 0, 255, 0, 255);

    SDL_SetRenderTarget(renderer, p2);

    SDL_RenderDrawLine(renderer, 0, 0, 50, 0);
    SDL_RenderDrawLine(renderer, 50, 0, 50, 50);
    SDL_RenderDrawLine(renderer, 50, 50, 0, 50);
    SDL_RenderDrawLine(renderer, 0, 50, 0, 0);

    SDL_SetRenderTarget(renderer, NULL);





    SDL_bool game_launch = SDL_TRUE;
    int mousex, mousey;

    while (game_launch)
    {
        tabjeu(renderer);

        SDL_Event event;
        while (SDL_PollEvent(&event))
        {
            switch (event.type)
            {

            case SDL_MOUSEBUTTONDOWN:
                mousex = event.button.x;
                mousey = event.button.y;
                mousex = (mousex/TCASE);
                mousey = (mousey/TCASE);

                printf("Valeur de x = %d   ||    Valeur de y = %d\n", mousex + 1, mousey + 1);
                continue;

            case SDL_KEYUP:
                switch (event.key.keysym.sym)
                {
                case SDLK_ESCAPE:
                    game_launch = SDL_FALSE;
                    continue;
                
            case SDL_KEYDOWN:
                switch (event.key.keysym.sym)
                {
                case SDLK_s:
                    texture(renderer, p1, 0, 0);
                    continue;
                }

                default:
                    break;
                }

            case SDL_QUIT:
                game_launch = SDL_FALSE;
                continue;
            
            default:
                break;
            }
        }
        texture(renderer, p1, 0, 0);
        texture(renderer, p2, 5, 5);
        texture(renderer, p, mousex, mousey);
        SDL_RenderPresent(renderer);
        SDL_SetRenderDrawColor(renderer,0,0,0,SDL_ALPHA_OPAQUE);
        SDL_RenderClear(renderer);
    }
    



    SDL_DestroyRenderer(renderer);
    SDL_DestroyWindow(window);
    SDL_Quit();
}

void SDL_ExitWithError(const char *text){

    SDL_Log("ERREUR : %s", text);
    SDL_Quit();
    exit(EXIT_FAILURE);
}

void tabjeu(SDL_Renderer *r){

    if(SDL_SetRenderDrawColor(r, 255, 0, 0, 255) != 0) SDL_ExitWithError("Rendu couleur");

    for(int i = TMIN; i <= TMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(r, i, TMIN, i, TMAX);
    }

    for(int i = TMIN; i <= TMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(r, TMIN, i, TMAX, i);
    }
}

void texture(SDL_Renderer *r, SDL_Texture *t, int x, int y){

    SDL_Rect pos;
    
    pos.x = (x*100) + 25;
    pos.y = (y*100) + 25;
    SDL_QueryTexture(t, NULL, NULL, &pos.w, &pos.h);
    SDL_RenderCopy(r, t, NULL, &pos);
}