                                    
#include "lib.h" 

//gcc src/jeusdl.c -o bin/a -I include -L lib -lmingw32 -lSDL2main -lSDL2 -lSDL2_ttf -mwindows            

int main(int argc, char **argv)
{
    /*Initialisation des variables*/////////////////////////////////

    Str_dim StrWindow = {1001,501};         // dimension de la fenetre
                                                            
    SDL_Window *window = NULL;				      //Initialisation variable fenetre
    SDL_Renderer *FondEcran = NULL; 				//Initialisation variable rendu


    /*Initialisation de la SDL*/////////////////////////////////////


    if(SDL_Init(SDL_INIT_VIDEO) != 0)   SDL_ExitWithError("Initialisation SDL_VIDEO");    //Initialisation de la SDL
    if(TTF_Init() == -1)                SDL_ExitWithError("Initialisation SDL_TTF");		  //Initialisation de la SDL pour les polices et textes



    /*Initialisation de la fenetre*/


    window = SDL_CreateWindow("JEU_DE_COMBAT", SDL_WINDOWPOS_CENTERED, SDL_WINDOWPOS_CENTERED, StrWindow.w, StrWindow.h, 0); //window prend pour valeur la fenetre initialiser

    if(window == NULL) SDL_ExitWithError("Initialisation SDL_WINDOW");		//Si la fenetre ne s'execute pas, renvoyer message d'erreur



    /*Initialisation du rendu*/


    FondEcran = SDL_CreateRenderer(window, -1, SDL_RENDERER_SOFTWARE);			//renderer prend pour valeur le rendu de la fenetre

    if(FondEcran == NULL) SDL_ExitWithError("Initialisation SDL_RENDERER");		//Si le rendu ne s'execute pas, renvoyer message d'erreur

    if(SDL_RenderClear(FondEcran) != 0) SDL_ExitWithError("Nettoyage SDL_RenderClear");	//Supprime le rendu de la fenetre 



    /*Initialisation des textures*/


    SDL_Texture *curseur = SDL_CreateTexture(FondEcran, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 50, 50);
    SDL_SetRenderDrawColor(FondEcran,255,0,0,255);

    SDL_SetRenderTarget(FondEcran, curseur);

    SDL_RenderDrawLine(FondEcran,50,50,0,0);
    SDL_RenderDrawLine(FondEcran,0,50,50,0);

    SDL_SetRenderTarget(FondEcran, NULL);




    SDL_Texture *pion1 = SDL_CreateTexture(FondEcran, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, 51, 51);
    SDL_SetRenderDrawColor(FondEcran, 0, 0, 255, 255);

    SDL_SetRenderTarget(FondEcran, pion1);

    SDL_RenderDrawLine(FondEcran,0 ,50 , 50, 50);
    SDL_RenderDrawLine(FondEcran,50 ,50 ,25 , 0);
    SDL_RenderDrawLine(FondEcran,25 ,0 ,0 , 50);

    SDL_SetRenderTarget(FondEcran, NULL);





    SDL_Texture *pion2 = SDL_CreateTexture(FondEcran, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, MTCASE+1, MTCASE+1);
    SDL_SetRenderDrawColor(FondEcran,255,0,0,255);

    SDL_Rect rpion2 = {0,0,MTCASE,MTCASE};

    SDL_SetRenderTarget(FondEcran, pion2);

    SDL_RenderDrawRect(FondEcran, &rpion2);

    SDL_SetRenderTarget(FondEcran, NULL);

    SDL_Texture *pion3 = SDL_CreateTexture(FondEcran, SDL_PIXELFORMAT_RGBA8888, SDL_TEXTUREACCESS_TARGET, MTCASE+1, MTCASE+1);
    SDL_SetRenderDrawColor(FondEcran,0,150,150,255);

    SDL_SetRenderTarget(FondEcran, pion3);

    SDL_RenderDrawRect(FondEcran, &rpion2);

    SDL_SetRenderTarget(FondEcran, NULL);




    /* Début du lancement du programme */

    SDL_bool prog_launch = SDL_TRUE, mode_attack = SDL_FALSE;
    int xmouse, ymouse;
    Str_pos spion1 = {0,0}, spion2 = {4,4};

    /* Police */

    TTF_Font *arial = NULL, *arialp = NULL;
    arial = TTF_OpenFont("C:/Windows/Fonts/ariblk.ttf",24);
    arialp = TTF_OpenFont("C:/Windows/Fonts/ariblk.ttf",12);
    if (arial == NULL || arial == NULL) SDL_ExitWithError("chargement police");

    SDL_Color rouge = {255,0,0,255};
    SDL_Color vert = {0,255,0,255};
    SDL_Color bleu = {0,0,255,255};

    /*Textuel*/

    char *text;
    SDL_Surface *surface = NULL;              //surface temporaire qui permet de copier les texte dans une texture
    SDL_Texture *t1 = NULL, *p1 = NULL, *p2 = NULL, *p3 = NULL, *p4 = NULL;

    surface = TTF_RenderText_Solid(arial,"Les types d'attaques",rouge);
    t1 = SDL_CreateTextureFromSurface(FondEcran, surface);

    surface = TTF_RenderText_Solid(arialp,"Rapproche",vert);
    p1 = SDL_CreateTextureFromSurface(FondEcran, surface);

    surface = TTF_RenderText_Solid(arialp,"distance",vert);
    p2 = SDL_CreateTextureFromSurface(FondEcran, surface);

    surface = TTF_RenderText_Solid(arialp,"Precision",vert);
    p3 = SDL_CreateTextureFromSurface(FondEcran, surface);

    surface = TTF_RenderText_Solid(arialp,"Corps a corps",vert);
    p4 = SDL_CreateTextureFromSurface(FondEcran, surface);

    if (t1 == NULL || p1 == NULL || p2 == NULL || p3 == NULL || p4 == NULL)       SDL_ExitWithError("texture text");
    if (surface == NULL)     SDL_ExitWithError("Surface text");
    SDL_FreeSurface(surface);

    /*Initialisation var 2*/

    int wtcorp, wtcurseur;
    int a,b,c,d,e,f;
    int aa,bb,cc,dd,ee,ff;

    while(prog_launch)		//Tant que programme = LANCER
    {
        display_tabjeu(FondEcran);
        SDL_Event event;  //Declaration de la variable(struct) event de type evenement
        while(SDL_PollEvent(&event)) 									//Tant qu'il y a des evenements
        {
            switch(event.type)												//Dans le cas où s'est un type d'evenement
            {
            case SDL_KEYDOWN:												//Dans l'évenement d'une touche enfoncée alors ...
                
            switch (event.key.keysym.sym)				//Dans le cas d'une touche du clavier
            {
                case SDLK_ESCAPE:								//Dans le cas de la touche echap faire ...
                prog_launch = SDL_FALSE;		//Le programme s'arrete
                break;
                case SDLK_a:
                mode_attack = SDL_TRUE;
                break;
                case SDLK_s:
                mode_attack = SDL_FALSE;
                break;
                default:
                continue;
            }
            case SDL_MOUSEBUTTONDOWN:
            xmouse = event.button.x;
            ymouse = event.button.y;
            xmouse = xmouse/TCASE;
            ymouse = ymouse/TCASE;
            
            printf("La valeur x = %d | La valeur y =%d\n", xmouse, ymouse);
            break;
            
            case SDL_QUIT:
            prog_launch = SDL_FALSE;
            break;
            default:
                break;
            }
    }

    if(xmouse == 1 && ymouse == 1)
    {
        spion1.x += 1;
        spion1.y += 1;
    }





    display_texture(FondEcran,pion2, spion1.x, spion1.y);
    display_texture(FondEcran,pion3, spion2.x, spion2.y);
    if(mode_attack)
    {
        SDL_QueryTexture(curseur,NULL,NULL,&aa,&ff);

        display_textureP(FondEcran,t1, 625, 25);

        display_textureP(FondEcran,curseur,620,110);
        display_textureP(FondEcran,p2, 620, 100);
        
        display_textureP(FondEcran,curseur,820,110);
        display_textureP(FondEcran,p3, 820, 100);
        
        display_textureP(FondEcran,curseur,615,310);
        display_textureP(FondEcran,p1,615,300);

        SDL_QueryTexture(p4,NULL,NULL,&bb,&ff);
        display_textureP(FondEcran,curseur,815+(bb-aa)/2,310);
        display_textureP(FondEcran,p4,815,300);
    }
    xmouse = 0;
    ymouse = 0;
    SDL_RenderPresent(FondEcran);
    SDL_SetRenderDrawColor(FondEcran,0,0,0,SDL_ALPHA_OPAQUE);   // Definir la couleur noir
    SDL_RenderClear(FondEcran);																 //définir tous les pixels du renderer à la couleur
    }


    /*Fermeture de la fenetre SDL*/
    
    SDL_DestroyTexture(p4);
    SDL_DestroyTexture(p3);
    SDL_DestroyTexture(p2);
    SDL_DestroyTexture(p1);
    SDL_DestroyTexture(t1);
    SDL_DestroyRenderer(FondEcran);	//Destruction du rendu
    SDL_DestroyWindow(window);		  //Destruction de la fenetre
    SDL_Quit();									    //Fermeture de la SDL

    return EXIT_SUCCESS;	//Retour si fermeture bein executee

}


int display_tabjeu(SDL_Renderer *r)
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
    return 1;
}

int display_texture(SDL_Renderer *rendu,SDL_Texture *t,int x,int y)
{
    SDL_Rect position;
    position.x = (x*TCASE)+TCASE/4;
    position.y = (y*TCASE)+TCASE/4;
    SDL_QueryTexture(t, NULL, NULL, &position.w, &position.h);
    SDL_RenderCopy(rendu, t, NULL, &position);
    return 1;
}

int display_textureP(SDL_Renderer *rendu,SDL_Texture *t,int x,int y)
{
    SDL_Rect position;
    position.x = x;
    position.y = y;
    SDL_QueryTexture(t, NULL, NULL, &position.w, &position.h);
    SDL_RenderCopy(rendu, t, NULL, &position);
    return 1;
}

void SDL_ExitWithError(const char *text){

    SDL_Log("ERREUR : %s > ERREUR %s", text, SDL_GetError());
    SDL_Quit();
    exit(EXIT_FAILURE);
}