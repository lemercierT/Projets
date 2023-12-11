# I. Mémoire, CPU, Capacités du disque dur

## Mémoire
La mémoire RAM du serveur "sujet5" a été évaluée à l'aide de la commande free -h, fournissant les informations suivantes : <br>
              total       utilisé      libre     partagé tamp/cache   disponible<br>
Mem:          1,9Gi       214Mi       1,1Gi       3,0Mi       676Mi       1,5Gi<br>
Partition d'échange:      974Mi       0,0Ki       974Mi<br>
Dans cette sortie, le serveur dispose de 1.9 Go de mémoire RAM totale, dont 214 Mi sont actuellement utilisés,
1.1 Go sont disponibles, et 974 Mi sont utilisés pour la partition d'échange.<br>

## Capacité disque dur
L'utilisation de l'espace disque sur le serveur a été analysée à l'aide de la commande df -h, fournissant le résultat suivant :<br>
Sys. de fichiers Taille Utilisé Dispo Uti% Monté sur<br>
udev               976M       0  976M   0% /dev<br>
tmpfs              199M    632K  198M   1% /run<br>
/dev/sda1           15G    2,0G   12G  15% /<br>
tmpfs              992M       0  992M   0% /dev/shm<br>
tmpfs              5,0M       0  5,0M   0% /run/lock<br>
tmpfs              199M       0  199M   0% /run/user/1000<br>
Cette sortie indique que le système de fichiers monté sur /dev/sda1 utilise actuellement 2.0 Go de l'espace disponible.<br>

## CPU
Les informations détaillées sur le CPU du serveur ont été obtenues avec la commande lscpu, fournissant le résultat suivant :<br>
Architecture :                          x86_64<br>
Mode(s) opératoire(s) des processeurs : 32-bit, 64-bit<br>
Boutisme :                              Little Endian<br>
Tailles des adresses:                   43 bits physical, 48 bits virtual<br>
Processeur(s) :                         1<br>
Liste de processeur(s) en ligne :       0<br>
Thread(s) par cœur :                    1<br>
Cœur(s) par socket :                    1<br>
Socket(s) :                             1<br>
Nœud(s) NUMA :                          1<br>
Identifiant constructeur :              GenuineIntel<br>
Famille de processeur :                 6<br>
Modèle :                                85<br>
Nom de modèle :                         Intel(R) Xeon(R) Bronze 3106 CPU @ 1.70GHz<br>
Révision :                              4<br>
Vitesse du processeur en MHz :          1696.015<br>
BogoMIPS :                              3392.03<br>
Constructeur d'hyperviseur :            VMware<br>
Type de virtualisation :                complet<br>
Cache L1d :                             32 KiB<br>
Cache L1i :                             32 KiB<br>
Cache L2 :                              1 MiB<br>
Cache L3 :                              11 MiB<br>
Nœud NUMA 0 de processeur(s) :          0<br>
Vulnerability Itlb multihit:            KVM: Mitigation: VMX unsupported<br>
Ces informations fournissent des détails sur l'architecture, le modèle, la vitesse, et d'autres caractéristiques du processeur du serveur<br>



# II. Installation du Serveur LAMP et Configuration de phpMyAdmin

## Connexion au Serveur:

ssh debian1@100.74.7.84<br>
passwd<br>
su - root<br>

## Mise à jour des informations des paquets:
apt update<br>

## Mise à jour du système d'exploitation et des logiciels: 
apt upgrade<br>

## Installation d'Apache:
apt install apache2<br>

## Installation de phpMyAdmin:
apt install phpmyadmin<br>

## Installation de MariaDB et PHP:
apt install mariadb-server<br>
apt install php<br>

## Sécurisation de MySQL/MariaDB:
mysql_secure_installation<br>

## Configuration de phpMyAdmin dans Apache:
nano /etc/apache2/apache2.conf<br>
Inclure la ligne suivante:<br>
Include /etc/phpmyadmin/apache.conf<br>

## Changement des permissions pour le dossier Backend:
chmod -R 755 /var/www/html/Backend<br>

# IV. Installation de UFW (Firewall)
## Installation de UFW:
apt install ufw<br>

## Vérification de l'État actuel de UFW:
ufw status<br>

## Réinitialisation de la configuration si déjà existante:
ufw reset<br>

## Configuration des règles UFW:
ufw allow 80/tcp<br>
ufw allow OpenSSH<br>
ufw enable<br>

# V. Installation de Tesseract OCR et Composer
## Accès au Dossier Backend:
cd /var/www/html/Backend<br>

## Téléchargement de Composer:
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"<br>

## Installation de Composer:
php composer-setup.php --install-dir=/bin --filename=composer<br>

## Installation de Tesseract OCR via Composer:
composer require thiagoalessio/tesseract_ocr<br>





# III. Difficultés recontrées

Au cours du déploiement du serveur Debian "sujet5", j'ai dû faire face à des défis qui ont enrichi mon expérience et ma compréhension du processus.<br> 
Deux problèmes majeurs ont émergé, chacun demandant une approche réfléchie pour les résoudre.<br>

## 1. Configuration de phpMyAdmin sans Mariadb-Server
L'une des difficultés majeures que j'ai rencontrées était liée à la configuration de phpMyAdmin.<br>
À l'origine, je n'avais pas installé le serveur Mariadb-Server, ce qui a provoqué des erreurs lors de la configuration de phpMyAdmin.<br>

Solution:<br>
Pour surmonter cette difficulté, j'ai pris la décision d'installer préalablement le serveur Mariadb-Server avant de configurer phpMyAdmin.<br>
Cette correction a permis d'établir la connexion nécessaire entre phpMyAdmin et la base de données, garantissant ainsi une configuration fonctionnelle.<br>

## 2. Installation de Tesseract OCR dans le Répertoire Backend
Une autre difficulté est survenue lors de l'installation de Tesseract OCR dans le répertoire Backend du serveur. Cette étape était cruciale pour assurer
le bon fonctionnement des scripts PHP utilisant Tesseract OCR afin de rendre un document d'identité sous forme textuelle et traitable.<br>

Solution:<br>
Face à ce défi, j'ai revu la procédure d'installation de Tesseract OCR, en m'assurant qu'il était correctement installé dans le répertoire Backend.<br>
Cette réévaluation a permis d'ajuster la configuration pour garantir le bon fonctionnement de Tesseract OCR dans cet environnement spécifique.<br>





# IIII. Sécurité du serveur
La sécurité du serveur Debian "sujet5" a été une priorité tout au long du processus de déploiement. Les mesures de sécurité mises en place comprennent les éléments suivants :<br>

## 1. Mise à jour du serveur
Pour éviter les failles de sécurité, le serveur a été mis à jour en utilisant les commandes suivantes :<br>
apt update<br>
apt upgrade<br>
Ces commandes ont assuré que le système d'exploitation et les logiciels installés bénéficient des derniers correctifs de sécurité.<br>

## 2. Gestion des droits d'accès sur les fichiers
La gestion des droits d'accès a été rigoureusement mise en œuvre sur les fichiers du serveur, notamment sur le dossier Backend, en utilisant la commande :<br>
chmod -R 755 /var/www/html/Backend<br>
Cela garantit des droits de lecture et d'exécution aux utilisateurs et propriétaires, tout en limitant les droits aux autres.<br>

## 3. Changement du code de la machine
Une mesure de sécurité fondamentale a été prise en changeant le code d'accès à la machine, garantissant un niveau supplémentaire de protection contre les accès non autorisés.<br>

## 4. Sécurisation de MySQL/MariaDB via mysql_secure_installation
Le processus de sécurisation de MySQL/MariaDB a été initié en utilisant la commande :<br>
mysql_secure_installation<br>
Cela permet de définir des paramètres de sécurité pour la base de données, y compris la définition de mots de passe forts et la désactivation des fonctionnalités non nécessaires.<br>

## 5. Modification des paramètres du serveur web
Des paramètres spécifiques ont été ajoutés au fichier de configuration du serveur Web pour masquer la version du serveur dans les réponses HTTP, contribuant ainsi à la sécurité en évitant la divulgation d'informations sensibles.

## 6. Installation d'UFW (Uncomplicated Firewall)
Un pare-feu UFW a été installé pour filtrer le trafic réseau. Les règles ont été configurées pour permettre uniquement le trafic sur les ports essentiels, tels que le port 22 (SSH) et le port 80 (HTTP en TCP) :<br>
ufw allow 22/tcp<br>
ufw allow 80/tcp<br>
ufw enable<br>
Ces règles assurent une sécurité renforcée en limitant les points d'entrée possibles pour le trafic réseau.<br>


## 7. Configuration serveur
### nano /etc/apache2/sites-available/sujet5_server.com.conf
<<VirtualHost *:80><br>
    ServerName sujet5server.com<br>
    ServerAlias www.sujet5server.com<br>
    DocumentRoot "/var/www/html"<br>
    <Directory "/var/www/html"><br>
        Options +FollowSymLinks<br>
        AllowOverride all<br>
        Require all granted<br>
        Deny from all<br>
        Allow from all<br>
    </Directory><br>
    ErrorLog /var/log/apache2/error.sujet5_server.log<br>
    CustomLog /var/log/apache2/access.sujet5_server.log combined<br>
</VirtualHost><br>


### nano /etc/hosts                                                                     
127.0.0.1       localhost <br>
100.74.7.84     sujet5.iutmetz.site.univ-lorraine.fr    sujet<br>
100.74.7.84     sujet5server.com                        www.sujet5server.com <br>
The following lines are desirable for IPv6 capable hosts <br>
::1     localhost ip6-localhost ip6-loopback <br>
ff02::1 ip6-allnodes <br>
ff02::2 ip6-allrouters <br>




IV. Conclusion<br>
L'ensemble des mesures de sécurité mises en place sur le serveur Debian "sujet5" vise à créer un environnement robuste et résilient contre les menaces potentielles. <br>
La combinaison de mises à jour régulières, de la gestion précise des droits d'accès, du changement du code d'accès, de la sécurisation de la base de données, 
de la modification des paramètres du serveur Web, et de l'installation d'UFW offre une défense complète contre les vulnérabilités courantes. <br>
Ce rapport fournit un aperçu détaillé des pratiques de sécurité mises en œuvre dans le cadre de ce déploiement.<br>