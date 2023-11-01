#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

int main(void){
    //SERVEUR

    //creation socket serveur TCP
    int server_socket = socket(AF_INET, SOCK_STREAM, 0);
    if(server_socket == -1){
        puts("erreur creation socket");
        return EXIT_FAILURE;
    }

    //serveur conf
    struct sockaddr_in server_adresse;
    server_adresse.sin_family = AF_INET; //adresse IPv4 
    server_adresse.sin_port = htons(34885); //encode pour big-endian
    server_adresse.sin_addr.s_addr = INADDR_ANY; //accepte toutes les adresses entrantes;
    if(bind(server_socket, (struct sockaddr*)&server_adresse, sizeof(server_adresse)) == -1){
        puts("erreur liaison socket a adresse");
        close(server_socket);
        return EXIT_FAILURE;
    }

    //ecoute sur la socket
    if(listen(server_socket, 5) == -1){
        puts("erreur mise en ecoute socket");
        close(server_socket);
        return EXIT_FAILURE;
    }

    puts("serveur en attente de connexion...");


    //CLIENT
    int client_socket;
    struct sockaddr_in client_adresse;
    socklen_t client_adr_length = sizeof(client_adresse);

    client_socket = accept(server_socket, (struct sockaddr*)&client_adresse, &client_adr_length);
    if(client_socket == -1){
        puts("erreur accepte connexion");
        close(server_socket);
        return EXIT_FAILURE;
    }

    puts("client connecte");

    //COMMUNICATION

    //reception
    char mess[100];
    int octects_recu, octects_envoye;

    while(1){
        octects_recu = recv(client_socket, mess, sizeof(mess), 0);
        if(octects_recu <= 0){
            puts("erreur lors de la reception des donnees");
            return EXIT_FAILURE;
        }
        mess[octects_recu] = '\0';
        system("clear");
        printf("client: %s", mess);
    

        //envoie
        puts("serveur: ");
        fgets(mess, sizeof(mess), stdin);
        octects_envoye = send(client_socket, mess, strlen(mess), 0);
        if(octects_envoye <= 0){
            puts("erreur envoie de donnees");
            return EXIT_FAILURE;
        }
    }

    close(client_socket);
    close(server_socket);

    return EXIT_SUCCESS;
}