#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

int main(){
    //CLIENT

    //creation socket client TCP
    int client_socket = socket(AF_INET, SOCK_STREAM, 0);
    if(client_socket == -1){
        puts("erreur creation socket");
        return EXIT_FAILURE;
    }

    //serveur conf
    struct sockaddr_in server_adresse;
    server_adresse.sin_family = AF_INET;
    server_adresse.sin_port = htons(34885);
    server_adresse.sin_addr.s_addr = inet_addr("127.0.0.1");
    
    //(struct sockaddr*)&server_adresse permet de caster l'adresse
    if(connect(client_socket, (struct sockaddr*)&server_adresse, sizeof(server_adresse)) == -1){
        puts("echec de connexion");
        close(client_socket);
        return EXIT_FAILURE;
    }

    puts("client connecte");

    //COMMUNICATION
    char mess[2048];
    int octects_recu, octects_envoye;

    while(1){
        fgets(mess, sizeof(mess), stdin);
        octects_envoye = send(client_socket, mess, strlen(mess), 0);
        if(octects_envoye <= 0){
            puts("echec envoie des donnees");
            return EXIT_FAILURE;
        }

        octects_recu = recv(client_socket, mess, sizeof(mess), 0);
        if(octects_recu <= 0){
            puts("echec reception des donnees");
            return EXIT_FAILURE;
        }

        mess[octects_recu] = '\0';
        system("clear");
        printf("serveur: %s", mess);
    }

    close(client_socket);

    return EXIT_SUCCESS;
}