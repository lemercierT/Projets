#!/bin/bash
o=0
if [ -d "$1"/"$2" ]; then
    echo "QUE SOUHAITEZ VOUS FAIRE :"
    echo "(1) saisir l'IP pour obtenir le nombre de requetes differentes effectuees par cette adresse durant le mois: "
    echo "(2) calculer le nombre de requetes differentes par mois : "
    echo "(3) saisir le nom d'un utilisateur et obtenir le nombre de codes statuts differents par mois: "
    echo "(4) saisir nom d'utilisateur et afficher toutes les IP differentes lui appartenant utilisees durant le mois : "
    read rep
    case $rep in
        1)
        echo "veuillez saisir l'IP de l'utilisateur :"
        read repip
        for((i=1;i<32;i++));
        do
        li=$i
            if [ $li -lt 10 ]; then
                li=$o$i
            fi

            if [ -e "$1"/"$2"/"$li""_access.log" ]; then
            nbr_req_ip=$(($nbr_req_ip + $(cat "$1"/"$2"/"$li""_access.log" | grep $repip | sort | uniq | wc -l)))
            fi
        done
        echo "l'adresse IP : $repip comptabilise$nbr_req_ip requetes differentes durant le mois"
        ;;
        2)
        echo "calcul du nombre de requetes durant le mois..."
        for((i=1;i<32;i++));
        do
            li=$i
            if [ $li -lt 10 ]; then
                li=$o$i
            fi
            if [ -e "$1"/"$2"/"$li""_access.log" ]; then
            nbr_req_m=$(($nbr_req_m + $(cat $1/2022/10/"$li""_access.log" | tr -s " " | cut -d "\"" -f2 | wc -l)))
            fi
        done
        echo "il y a eu $nbr_req_m requetes durant le mois"
        ;;
        3)
        echo "saisir le nom de l'utilisateur :"
        read nomr
        echo "calcul du nombre de codes statuts..."
        for((i=1;i<32;i++));
        do
            li=$i
            if [ $li -lt 10 ]; then
                li=$o$i
            fi
            if [ -e "$1"/"$2"/"$li""_access.log" ]; then
            nbr_cd_stat=$(($nbr_cd_stat + $(cat $1/2022/10/"$li""_access.log" | grep $nomr | tr -s " " | cut -d " " -f8,9 | wc -l)))
            fi
        done
        echo "l'utilisateur : $nomr comptabilise  $nbr_cd_stat codes status differents durant le mois"
        ;;
        4)
        echo "saisir le nom de l'utilisateur :"
        read nomr1
        for((i=1;i<32;i++));
        do
            li=$i
            if [ $li -lt 10 ]; then
                li=$o$i
            fi
            if [ -e "$1"/"$2"/"$li""_access.log" ]; then
            cat $1/2022/10/"$li""_access.log" | grep $nomr1 | tr -s " " | cut -d " " -f1 | sort | uniq
            fi
        done
        ;;
    esac
fi