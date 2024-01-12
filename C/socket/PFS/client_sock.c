#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

int main(void){
    int client_socket = socket(AF_INET, SOCK_STREAM, 0);
    if(client_socket == -1){
        perror("Erreur creation socket client TCP.");
        return EXIT_FAILURE;
    }

    struct sockaddr_in serveur_adresse;
    serveur_adresse.sin_family = AF_INET;
    serveur_adresse.sin_port = htons(44446);
    serveur_adresse.sin_addr.s_addr = inet_addr("127.0.0.1");

    if(connect(client_socket, (struct sockaddr*)&serveur_adresse, sizeof(serveur_adresse)) == -1){
        perror("Connection au serveur echoue.");
        close(client_socket);
        return EXIT_FAILURE;
    }

    puts("Connecte.");

    //COM
    char message[100];
    int mess_recv, mess_send;

    mess_recv = recv(client_socket, message, sizeof(message), 0);
    if(mess_recv <= 0){
        perror("[+]no data.");
        return EXIT_FAILURE;
    }
    message[mess_recv] = '\0';
    printf("serveur: %s", message);
    

    close(client_socket);
    return EXIT_SUCCESS;
}