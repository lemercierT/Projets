#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <sys/socket.h>
#include <arpa/inet.h>
#include <unistd.h>

int main(void){
    //SERVEUR
    int server_socket = socket(AF_INET, SOCK_STREAM, 0);
    if(server_socket == -1){
        perror("Erreur création socket TCP.");
        return EXIT_FAILURE;
    }

    struct sockaddr_in server_adresse;
    server_adresse.sin_family = AF_INET;
    server_adresse.sin_port = htons(44446);
    server_adresse.sin_addr.s_addr = INADDR_ANY;

    if(bind(server_socket, (struct sockaddr*)&server_adresse, sizeof(server_adresse)) == -1){
        perror("Erreur configuration serveur.");
        close(server_socket);
        return EXIT_FAILURE;
    }

    if(listen(server_socket, 2) == -1){
        perror("Erreur nombre de client.");
        close(server_socket);
        return EXIT_FAILURE;
    }

    puts("En attente d'une connexion...");

    //CLIENT
    int client_socket;
    struct sockaddr_in client_adresse;
    socklen_t client_sock_len = sizeof(client_adresse);

    client_socket = accept(server_socket, (struct sockaddr*)&client_adresse, &client_sock_len);
    if(client_socket == -1){
        perror("Erreur acceptation client.");
        close(server_socket);
        return EXIT_FAILURE;
    }

    puts("Connecte.");

    char* question;
    question = "quelle est la couleur du ciel ?\n";
    int question_len = strlen(question);

    int data_sent;
    data_sent = send(client_socket, question, question_len, 0);
        if(data_sent <= 0){
            perror("Erreur envoie data.");
            close(client_socket);
            close(server_socket);
            return EXIT_FAILURE;
        }
        puts("[+]data sent.");

    close(client_socket);
    close(server_socket);
    return EXIT_SUCCESS;
}
