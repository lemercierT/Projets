#!/bin/bash

if [ -e "$1"//$2"_access.log" ]; then
    
    echo "QUE SOUHAITEZ VOUS FAIRE :"
    echo "(1) saisir l'IP pour obtenir le nombre de requetes differentes effectuees par cette adresse :"
    echo "(2) calculer le nombre de requetes differentes par heure de la journee :"
    echo "(3) saisir le nom d'un utilisateur et obtenir le nombre de codes statuts differents : "
    echo "(4) saisir nom d'utilisateur et afficher toutes les IP differentes lui appartenant : "
    read rep
    case $rep in
        1) 
            echo "veuillez saisir l'IP de l'utilisateur :"
            read repip
            nbr_req_ip=$(cat "$1"//$2"_access.log" | grep $repip | wc -l)
            echo "l'adresse IP : $repip comptabilise$nbr_req_ip requetes"
        ;;
        2)
            echo "veuillez saisir l'heure de la journee afin de comptabiliser le nombre de requetes :"
            read heure
            nbr_reqh=$(cat "$1"//$2"_access.log" | tr -s " " | cut -d " " -f3 | cut -d ":" -f2 | grep $heure | wc -l)
            echo "il y a eu $nbr_reqh requetes au total dans l'heure"
        ;;
        3) 
            echo "saisir le nom de l'utilisateur :"
            read nomr
            echo "calcul du nombre de codes statuts..."
            nbr_cd_stat=$(cat $1//"$2""_access.log" | grep $nomr | tr -s " " | cut -d " " -f8,9 | wc -l)
            echo "l'utilisateur : $nomr comptabilise  $nbr_cd_stat codes status differents"
        ;;
        4) 
            echo "saisir le nom de l'utilisateur :"
            read nomr1
            echo "recherche des IP differentes de l'utilisateurs..."
            cat $1//"$2""_access.log" | grep $nomr1 | tr -s " " | cut -d " " -f1 | sort | uniq
        ;;
        
    esac
else
    echo "erreur"
fi