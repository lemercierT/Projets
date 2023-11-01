#include <SDL.h>
#include <stdio.h>
#include <stdlib.h>

void SDL_ExitWithError(const char *text);

int main(int argc, char **argv){

    SDL_Window *window = NULL;
    SDL_Renderer *renderer = NULL;


    if (SDL_Init(SDL_INIT_VIDEO) != 0)
    {
        SDL_ExitWithError("ERREUR");
    }

    window = SDL_CreateWindow("sdl2.1", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, 800, 600, 0);

    if (window == NULL)
    {
        SDL_ExitWithError("Error window");
    }

    renderer = SDL_CreateRenderer(window, -1, SDL_RENDERER_SOFTWARE);

    if (renderer == NULL)
    {
        SDL_ExitWithError("Error renderer");
    }
    
    SDL_RenderPresent(renderer);

    if(SDL_RenderClear(renderer) != 0)
    {
        SDL_ExitWithError("ERREUR Clear");
    }

    SDL_Delay(3000);

    SDL_DestroyRenderer(renderer);
    SDL_DestroyWindow(window);
    SDL_Quit();

    
    

}

void SDL_ExitWithError(const char *text){

    SDL_Log("ERREUR : %s > ERREUR %s", text, SDL_GetError());
    SDL_Quit();
    exit(EXIT_FAILURE);
}