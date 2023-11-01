//gcc src/mainsdl.c -o bin/mainsdl.c -I include -L lib -lmingw32 -lSDL2main -lSDL2
#include <SDL.h>
#include <stdio.h>
#include <stdlib.h>

int main(int argc, char **argv){

    SDL_Window *window = NULL;

    if (SDL_Init(SDL_INIT_EVERYTHING) != 0)
    {
        SDL_Log("ERREUR : Initialisation SDL > %s \n", SDL_GetError());
        exit(EXIT_FAILURE);
    }

    window = SDL_CreateWindow("sdl2", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, 800, 600, 0);

    
    if (window == NULL)
    {
        SDL_Log("ERREUR : Initialisation FENETE SDL > %s\n", SDL_GetError);
    }
    
        SDL_Delay(3000);
        SDL_DestroyWindow(window);

    SDL_Quit();

    return EXIT_SUCCESS;
}