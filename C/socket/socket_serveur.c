#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <unistd.h>
#include <arpa/inet.h>
#include <sys/socket.h>

int main() {
    // Création de la socket
    int server_socket = socket(AF_INET, SOCK_STREAM, 0);
    if (server_socket == -1) {
        perror("Erreur lors de la création de la socket");
        exit(EXIT_FAILURE);
    }

    // Configuration de l'adresse du serveur
    struct sockaddr_in server_address;
    server_address.sin_family = AF_INET;
    server_address.sin_port = htons(12345); // Port à utiliser (vous pouvez changer ce port)
    server_address.sin_addr.s_addr = INADDR_ANY;

    // Liaison de la socket à l'adresse et au port
    if (bind(server_socket, (struct sockaddr*)&server_address, sizeof(server_address)) == -1) {
        perror("Erreur lors de la liaison de la socket à l'adresse");
        close(server_socket);
        exit(EXIT_FAILURE);
    }

    // Mise en écoute de la socket
    if (listen(server_socket, 5) == -1) {
        perror("Erreur lors de la mise en écoute de la socket");
        close(server_socket);
        exit(EXIT_FAILURE);
    }

    printf("Serveur en attente de connexions...\n");

    // Accepter les connexions entrantes
    int client_socket;
    struct sockaddr_in client_address;
    socklen_t client_addr_len = sizeof(client_address);

    client_socket = accept(server_socket, (struct sockaddr*)&client_address, &client_addr_len);
    if (client_socket == -1) {
        perror("Erreur lors de l'acceptation de la connexion");
        close(server_socket);
        exit(EXIT_FAILURE);
    }

    printf("Client connecté.\n");

    // Communication avec le client
    char message[1024];
    int bytes_received, bytes_sent;

    while (1) {
        // Réception du message du client
        bytes_received = recv(client_socket, message, sizeof(message), 0);
        if (bytes_received <= 0) {
            perror("Erreur lors de la réception du message du client ou client déconnecté");
            break;
        }

        message[bytes_received] = '\0';
        printf("Client : %s", message);

        // Envoi de la réponse au client
        printf("Serveur : ");
        fgets(message, sizeof(message), stdin);
        bytes_sent = send(client_socket, message, strlen(message), 0);
        if (bytes_sent <= 0) {
            perror("Erreur lors de l'envoi de la réponse au client");
            break;
        }
    }

    // Fermeture des sockets
    close(client_socket);
    close(server_socket);

    return 0;
}
