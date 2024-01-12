#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <arpa/inet.h>
#include <sys/socket.h>

int main() {
    // Création de la socket du client
    int client_socket = socket(AF_INET, SOCK_STREAM, 0);
    if (client_socket == -1) {
        perror("Erreur lors de la création de la socket du client");
        exit(EXIT_FAILURE);
    }

    // Configuration de l'adresse du serveur
    struct sockaddr_in server_address;
    server_address.sin_family = AF_INET;
    server_address.sin_port = htons(12345); // Port à utiliser (même que le serveur)
    server_address.sin_addr.s_addr = inet_addr("127.0.0.1"); // Adresse IP du serveur

    // Connexion au serveur
    if (connect(client_socket, (struct sockaddr*)&server_address, sizeof(server_address)) == -1) {
        perror("Erreur lors de la connexion au serveur");
        close(client_socket);
        exit(EXIT_FAILURE);
    }

    printf("Connecté au serveur.\n");

    // Communication avec le serveur
    char message[1024];
    int bytes_received, bytes_sent;

    while (1) {
        // Envoi du message au serveur
        printf("Client : ");
        fgets(message, sizeof(message), stdin);
        bytes_sent = send(client_socket, message, strlen(message), 0);
        if (bytes_sent <= 0) {
            perror("Erreur lors de l'envoi du message au serveur");
            break;
        }

        // Réception de la réponse du serveur
        bytes_received = recv(client_socket, message, sizeof(message), 0);
        if (bytes_received <= 0) {
            perror("Erreur lors de la réception de la réponse du serveur ou serveur déconnecté");
            break;
        }

        message[bytes_received] = '\0';
        printf("Serveur : %s", message);
    }

    // Fermeture de la socket du client
    close(client_socket);

    return 0;
}
