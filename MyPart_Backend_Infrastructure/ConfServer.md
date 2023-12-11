# I. Mémoire, CPU, Capacités du disque dur

## Mémoire
La mémoire RAM du serveur "sujet5" a été évaluée à l'aide de la commande free -h, fournissant les informations suivantes : 
              total       utilisé      libre     partagé tamp/cache   disponible
Mem:          1,9Gi       214Mi       1,1Gi       3,0Mi       676Mi       1,5Gi
Partition d'échange:      974Mi       0,0Ki       974Mi
Dans cette sortie, le serveur dispose de 1.9 Go de mémoire RAM totale, dont 214 Mi sont actuellement utilisés, 
1.1 Go sont disponibles, et 974 Mi sont utilisés pour la partition d'échange.

## Capacité disque dur
L'utilisation de l'espace disque sur le serveur a été analysée à l'aide de la commande df -h, fournissant le résultat suivant :
Sys. de fichiers Taille Utilisé Dispo Uti% Monté sur
udev               976M       0  976M   0% /dev
tmpfs              199M    632K  198M   1% /run
/dev/sda1           15G    2,0G   12G  15% /
tmpfs              992M       0  992M   0% /dev/shm
tmpfs              5,0M       0  5,0M   0% /run/lock
tmpfs              199M       0  199M   0% /run/user/1000
Cette sortie indique que le système de fichiers monté sur /dev/sda1 utilise actuellement 2.0 Go de l'espace disponible.

## CPU
Les informations détaillées sur le CPU du serveur ont été obtenues avec la commande lscpu, fournissant le résultat suivant :
Architecture :                          x86_64
Mode(s) opératoire(s) des processeurs : 32-bit, 64-bit
Boutisme :                              Little Endian
Tailles des adresses:                   43 bits physical, 48 bits virtual
Processeur(s) :                         1
Liste de processeur(s) en ligne :       0
Thread(s) par cœur :                    1
Cœur(s) par socket :                    1
Socket(s) :                             1
Nœud(s) NUMA :                          1
Identifiant constructeur :              GenuineIntel
Famille de processeur :                 6
Modèle :                                85
Nom de modèle :                         Intel(R) Xeon(R) Bronze 3106 CPU @ 1.70GHz
Révision :                              4
Vitesse du processeur en MHz :          1696.015
BogoMIPS :                              3392.03
Constructeur d'hyperviseur :            VMware
Type de virtualisation :                complet
Cache L1d :                             32 KiB
Cache L1i :                             32 KiB
Cache L2 :                              1 MiB
Cache L3 :                              11 MiB
Nœud NUMA 0 de processeur(s) :          0
Vulnerability Itlb multihit:            KVM: Mitigation: VMX unsupported
Ces informations fournissent des détails sur l'architecture, le modèle, la vitesse, et d'autres caractéristiques du processeur du serveur



# II. Installation du Serveur LAMP et Configuration de phpMyAdmin

## Connexion au Serveur:

ssh debian1@100.74.7.84
passwd
su - root

## Mise à jour des informations des paquets:
apt update

## Mise à jour du système d'exploitation et des logiciels: 
apt upgrade 

## Installation d'Apache:
apt install apache2

## Installation de phpMyAdmin:
apt install phpmyadmin

## Installation de MariaDB et PHP:
apt install mariadb-server
apt install php

## Sécurisation de MySQL/MariaDB:
mysql_secure_installation

## Configuration de phpMyAdmin dans Apache:
nano /etc/apache2/apache2.conf
Inclure la ligne suivante:
Include /etc/phpmyadmin/apache.conf

## Changement des permissions pour le dossier Backend:
chmod -R 755 /var/www/html/Backend

# IV. Installation de UFW (Firewall)
## Installation de UFW:
apt install ufw

## Vérification de l'État actuel de UFW:
ufw status

## Réinitialisation de la configuration si déjà existante:
ufw reset

## Configuration des règles UFW:
ufw allow 80/tcp
ufw allow OpenSSH
ufw enable

# V. Installation de Tesseract OCR et Composer
## Accès au Dossier Backend:
cd /var/www/html/Backend

## Téléchargement de Composer:
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"

## Installation de Composer:
php composer-setup.php --install-dir=/bin --filename=composer

## Installation de Tesseract OCR via Composer:
composer require thiagoalessio/tesseract_ocr





# III. Difficultés recontrées

Au cours du déploiement du serveur Debian "sujet5", j'ai dû faire face à des défis qui ont enrichi mon expérience et ma compréhension du processus. Deux problèmes majeurs ont émergé, chacun demandant une approche réfléchie pour les résoudre.

## 1. Configuration de phpMyAdmin sans Mariadb-Server
L'une des difficultés majeures que j'ai rencontrées était liée à la configuration de phpMyAdmin. 
À l'origine, je n'avais pas installé le serveur Mariadb-Server, ce qui a provoqué des erreurs lors de la configuration de phpMyAdmin.

Solution:
Pour surmonter cette difficulté, j'ai pris la décision d'installer préalablement le serveur Mariadb-Server avant de configurer phpMyAdmin. 
Cette correction a permis d'établir la connexion nécessaire entre phpMyAdmin et la base de données, garantissant ainsi une configuration fonctionnelle.

## 2. Installation de Tesseract OCR dans le Répertoire Backend
Une autre difficulté est survenue lors de l'installation de Tesseract OCR dans le répertoire Backend du serveur. Cette étape était cruciale pour assurer 
le bon fonctionnement des scripts PHP utilisant Tesseract OCR afin de rendre un document d'identité sous forme textuelle et traitable.

Solution:
Face à ce défi, j'ai revu la procédure d'installation de Tesseract OCR, en m'assurant qu'il était correctement installé dans le répertoire Backend. 
Cette réévaluation a permis d'ajuster la configuration pour garantir le bon fonctionnement de Tesseract OCR dans cet environnement spécifique.





# IIII. Sécurité du serveur
La sécurité du serveur Debian "sujet5" a été une priorité tout au long du processus de déploiement. Les mesures de sécurité mises en place comprennent les éléments suivants :

## 1. Mise à jour du serveur
Pour éviter les failles de sécurité, le serveur a été mis à jour en utilisant les commandes suivantes :
apt update
apt upgrade
Ces commandes ont assuré que le système d'exploitation et les logiciels installés bénéficient des derniers correctifs de sécurité.

## 2. Gestion des droits d'accès sur les fichiers
La gestion des droits d'accès a été rigoureusement mise en œuvre sur les fichiers du serveur, notamment sur le dossier Backend, en utilisant la commande :
chmod -R 755 /var/www/html/Backend
Cela garantit des droits de lecture et d'exécution aux utilisateurs et propriétaires, tout en limitant les droits aux autres.

## 3. Changement du code de la machine
Une mesure de sécurité fondamentale a été prise en changeant le code d'accès à la machine, garantissant un niveau supplémentaire de protection contre les accès non autorisés.

## 4. Sécurisation de MySQL/MariaDB via mysql_secure_installation
Le processus de sécurisation de MySQL/MariaDB a été initié en utilisant la commande :
mysql_secure_installation
Cela permet de définir des paramètres de sécurité pour la base de données, y compris la définition de mots de passe forts et la désactivation des fonctionnalités non nécessaires.

## 5. Modification des paramètres du serveur web
Des paramètres spécifiques ont été ajoutés au fichier de configuration du serveur Web pour masquer la version du serveur dans les réponses HTTP, contribuant ainsi à la sécurité en évitant la divulgation d'informations sensibles.

## 6. Installation d'UFW (Uncomplicated Firewall)
Un pare-feu UFW a été installé pour filtrer le trafic réseau. Les règles ont été configurées pour permettre uniquement le trafic sur les ports essentiels, tels que le port 22 (SSH) et le port 80 (HTTP en TCP) :
ufw allow 22/tcp
ufw allow 80/tcp
ufw enable
Ces règles assurent une sécurité renforcée en limitant les points d'entrée possibles pour le trafic réseau.


## 7. Configuration serveur
### nano /etc/apache2/sites-available/sujet5_server.com.conf
<VirtualHost *:80>
    ServerName sujet5server.com
    ServerAlias www.sujet5server.com
    DocumentRoot "/var/www/html"
    <Directory "/var/www/html">
        Options +FollowSymLinks
        AllowOverride all
        Require all granted
        Deny from all
        Allow from all
    </Directory>
    ErrorLog /var/log/apache2/error.sujet5_server.log
    CustomLog /var/log/apache2/access.sujet5_server.log combined
</VirtualHost>


### nano /etc/hosts                                                                     
127.0.0.1       localhost
100.74.7.84     sujet5.iutmetz.site.univ-lorraine.fr    sujet5
100.74.7.84     sujet5server.com                        www.sujet5server.com
# The following lines are desirable for IPv6 capable hosts
::1     localhost ip6-localhost ip6-loopback
ff02::1 ip6-allnodes
ff02::2 ip6-allrouters




IV. Conclusion
L'ensemble des mesures de sécurité mises en place sur le serveur Debian "sujet5" vise à créer un environnement robuste et résilient contre les menaces potentielles. 
La combinaison de mises à jour régulières, de la gestion précise des droits d'accès, du changement du code d'accès, de la sécurisation de la base de données, 
de la modification des paramètres du serveur Web, et de l'installation d'UFW offre une défense complète contre les vulnérabilités courantes. 
Ce rapport fournit un aperçu détaillé des pratiques de sécurité mises en œuvre dans le cadre de ce déploiement.