//gcc src/sdlrendu.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2
//gcc src/sdlrendu.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2 -mwindows
#include <SDL.h>
#include <stdio.h>
#include <stdlib.h>

void SDL_ExitWithError(const char *message);

int main(int argc, char **argv){

    SDL_Window *window = NULL;
    SDL_Renderer *renderer = NULL;

    if (SDL_Init(SDL_INIT_VIDEO) != 0)
    {
        SDL_ExitWithError("ERREUR D'INITIALISATION");
    }


    window = SDL_CreateWindow("sdl2", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, 800, 600, 0);

    
    if (window == NULL)
    {
        SDL_ExitWithError("ERREUR D'INITIALISATION DE LA FENETRE");
    }


    renderer = SDL_CreateRenderer(window, -1, SDL_RENDERER_SOFTWARE);


    if (renderer = NULL)
    {
        SDL_ExitWithError("ERREUR RENDU FENETRE");
    }

    SDL_RenderPresent(renderer);

    if (SDL_RenderClear(renderer) != 0)
    {
        SDL_ExitWithError("ERREUR CLEAR");
    }
    
    
        SDL_Delay(3000);

    SDL_DestroyRenderer(renderer);
    SDL_DestroyWindow(window);
    SDL_Quit();

    return EXIT_SUCCESS;
}

void SDL_ExitWithError(const char *message)
{
    SDL_Log("ERREUR : %s > Initialisation %s", message, SDL_GetError());
    SDL_Quit();
    exit(EXIT_FAILURE);
}

/*if (SDL_CreateWindowAndRenderer(800, 600, 0, &window, &renderer))
{
    SDL_Log("ERREUR: %s > Initialisation %s", message, SDL_GetError());
    SDL_Quit();
    exit(EXIT_FAILURE);
}*/


