// gcc src/sdllll.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2 -lSDL2_ttf

#include <stdio.h>
#include <stdlib.h>
#include <SDL2/SDL.h>
#include <SDL2/SDL_ttf.h>		
#include <SDL2/SDL_image.h>

#define LMAX 1000
#define TMIN 0
#define CMAX 1000
#define TCASE 100

typedef struct window
{
    int w;
    int h;
} strucwin;


void SDL_ExitWithError(const char *mess);
void create_render1(SDL_Renderer *rd);
void create_render2(SDL_Renderer *rd1);
void create_texture(SDL_Renderer *r, SDL_Texture *t, int x, int y);

int main(int argc, char **argv){

    strucwin taille = {1001, 1001};

    SDL_Window *window1 = NULL;
    SDL_Renderer *render1 = NULL;
    SDL_Renderer *render2 = NULL; 

    window1 = SDL_CreateWindow("SDLtesttt", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, taille.w, taille.h, 0);
    render1 = SDL_CreateRenderer(window1, -1, SDL_RENDERER_SOFTWARE);
    render2 = SDL_CreateRenderer(window1, -1, SDL_RENDERER_SOFTWARE);

    if(SDL_Init(SDL_INIT_VIDEO) != 0) SDL_ExitWithError("INITIALISATION SDL");
    if(window1 == NULL) SDL_ExitWithError("INITIALISATION WINDOW");
    if(render1 == NULL) SDL_ExitWithError("INITIALISATION RENDU");

    SDL_RenderPresent(render1);
    if(SDL_RenderClear(render1) != 0) SDL_ExitWithError("INITIALISATION CLEAR RENDU");

    SDL_Texture *carre = SDL_CreateTexture(render1, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 51, 51);
    SDL_SetRenderDrawColor(render1, 255, 0, 0, 0);
    SDL_SetRenderTarget(render1, carre);
    SDL_RenderDrawLine(render1, 0, 0, 50, 0);
    SDL_RenderDrawLine(render1, 50, 0, 50, 50);
    SDL_RenderDrawLine(render1, 50, 50, 0, 50);
    SDL_RenderDrawLine(render1, 0, 50, 0, 0);
    SDL_SetRenderTarget(render1, NULL);

    SDL_Texture *fond = SDL_CreateTexture(render1, SDL_PIXELFORMAT_RGBA8888, SDL_RENDERER_SOFTWARE, 102, 102);
    SDL_SetRenderDrawColor(render1, 0, 255, 25, 0);
    SDL_SetRenderTarget(render2, fond);
    for (int i = 0; i < LMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(render1, 0, i, LMAX, i);
    }

    for (int i = 0; i < CMAX; i+=TCASE)
    {
        SDL_RenderDrawLine(render1, i, 0, i, CMAX);
    }
    SDL_SetRenderTarget(render1, NULL);


    SDL_bool game_launch = SDL_TRUE;
    SDL_Event event1;
    int clickx, clicky;

    while(game_launch)
    {   
        create_render1(render1);
        while(SDL_PollEvent(&event1))
        switch (event1.type)
        {
        
        case SDL_MOUSEBUTTONDOWN:   
            clickx = event1.button.x;
            clicky = event1.button.y;
            clickx = (clickx/TCASE);
            clicky = (clicky/TCASE);
        
            printf("X = %d   ||   Y = %d   \n", clickx, clicky);


        case SDL_KEYDOWN:
            switch (event1.key.keysym.sym)
            {
            case SDLK_ESCAPE:
                game_launch = SDL_FALSE;
                break;
            }
            break;
        
        default:
            break;
        }
        create_texture(render2, fond, 0, 0);
        create_texture(render1, carre, clickx, clicky);
        SDL_RenderPresent(render1);
        SDL_SetRenderDrawColor(render1, 0, 0, 0, SDL_ALPHA_OPAQUE);
    }
    SDL_RenderClear(render1);
    SDL_DestroyRenderer(render1);
    SDL_RenderClear(render2);
    SDL_DestroyRenderer(render2);
    SDL_DestroyWindow(window1);
    SDL_Quit();

}

void create_render1(SDL_Renderer *rd){

    if(SDL_SetRenderDrawColor(rd, 255, 255, 0, 0) != 0) SDL_ExitWithError("INITIALISATION RENDU COULEUR");

    for (int i = 0; i < LMAX-100; i+=TCASE)
    {
        SDL_RenderDrawLine(rd, 0, i, LMAX, i);
    }

    for (int i = 0; i < CMAX-100; i+=TCASE)
    {
        SDL_RenderDrawLine(rd, i, 0, i, CMAX);
    }
}

void create_render2(SDL_Renderer *rd1){

    if(SDL_SetRenderDrawColor(rd1, 0, 0, 255, 0) != 0) SDL_ExitWithError("INITIALISATION RENDU COULEUR 2");

    for (int i = LMAX; i > 750; i++)
    {
        SDL_RenderDrawLine(rd1, 0, i, LMAX, i);
    }
    
}

void create_texture(SDL_Renderer *r, SDL_Texture *t, int x, int y){

    SDL_Rect size;

    size.x = (x*100)+25;
    size.y = (y*100)+25;
    SDL_QueryTexture(t, NULL, NULL, &size.w, &size.h);
    SDL_RenderCopy(r, t, NULL, &size);

}

void SDL_ExitWithError(const char *mess){

    SDL_Log("ERREUR : %s", mess);
    SDL_Quit();
    exit(EXIT_FAILURE);
}