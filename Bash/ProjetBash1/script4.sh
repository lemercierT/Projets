#!/bin/bash

if [ -e "$1"/"$2""_error.log" ]; then
    echo "QUE SOUHAITEZ VOUS FAIRE :"
    echo "(1) afficher la totalitee des erreurs sur la journee : "
    echo "(2) afficher la totalitee des erreurs et les sauvegarder dans un fichier .imp : "
    echo "(3) calculer le nombre d'erreurs sur la journee : "
    echo "(4) calculer le nombre de type d'erreurs differents sur la journee : "
    echo "(5) saisir une adresse IP et obtenir les erreurs enregistree pour cette adresse : "
    echo "(6) saisir un PID et obtenir les erreurs correspondantes : "
    echo "(7) saisir un type d'erreur et afficher les differents messages d'erreurs correspondants : "
    read rep
    case $rep in 
        1)
            echo "affichage de la totalitee des erreurs sur la journee..."
            jour=$(cat $1/"$2""_error.log" | cut -d "[" -f2 | cut -d " " -f1 | head -1 | tail -1)
            case $jour in
                Mon)
                    jour1="Lundi"
                ;;
                Tue)
                    jour1="Mardi"
                ;;
                Wed)
                    jour1="Mercredi"
                ;;
                Thu)
                    jour1="Jeudi"
                ;;
                Fri)
                    jour1="Vendredi"
                ;;
                Sat)
                    jour1="Samedi"
                ;;
                Sun)
                    jour1="Dimanche"
                ;;
            esac
            mois=$(cat $1/"$2""_error.log" | cut -d "[" -f2 | cut -d " " -f2 | head -1 | tail -1)
            case $mois in
                Jan)
                    mois1="Janvier"
                    ;;
                Feb)
                    mois1="Fevrier"
                    ;;
                Mar)
                    mois1="Mars"
                    ;;
                Apr)
                    mois1="Avril"
                    ;;
                May)
                    mois1="Mai"
                    ;;
                Jun)
                    mois1="Juin"
                    ;;
                Jul)
                    mois1="Juillet"
                    ;;
                Aug)
                    mois1="Aout"
                    ;;
                Sep)
                    mois1="Septembre"
                    ;;
                Oct)
                    mois1="Octobre"
                    ;;
                Nov)
                    mois1="Novembre"
                    ;;
                Dec)
                    mois1="Decembre"
                    ;;
            esac
            numjour=$(cat $1/"$2""_error.log" | tr -s " " | cut -d " " -f3 | head -1 | tail -1)
            annee=$(cat $1/"$2""_error.log" | tr -s " " | cut -d " " -f5 | cut -d "]" -f1 | head -1 | tail -1)
                echo "ERREUR DU $jour1 $numjour $mois1 $annee :" && cat $1/"$2""_error.log" | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g' |tr -s " " | cut -d " " -f6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35 

        ;;
        2)
            echo "chargement de la totalitee des erreurs sur la journee..."
            jourr=$(cat $1/"$2""_error.log" | cut -d "[" -f2 | cut -d " " -f1 | head -1 | tail -1)
            case $jourr in
                Mon)
                    jourr1="Lundi"
                ;;
                Tue)
                    jourr1="Mardi"
                ;;
                Wed)
                    jourr1="Mercredi"
                ;;
                Thu)
                    jourr1="Jeudi"
                ;;
                Fri)
                    jourr1="Vendredi"
                ;;
                Sat)
                    jourr1="Samedi"
                ;;
                Sun)
                    jourr1="Dimanche"
                ;;
            esac
            moiss=$(cat $1/"$2""_error.log" | cut -d "[" -f2 | cut -d " " -f2 | head -1 | tail -1)
            case $moiss in
                Jan)
                    moiss1="Janvier"
                    ;;
                Feb)
                    moiss1="Fevrier"
                    ;;
                Mar)
                    moiss1="Mars"
                    ;;
                Apr)
                    moiss1="Avril"
                    ;;
                May)
                    moiss1="Mai"
                    ;;
                Jun)
                    moiss1="Juin"
                    ;;
                Jul)
                    moiss1="Juillet"
                    ;;
                Aug)
                    moiss1="Aout"
                    ;;
                Sep)
                    moiss1="Septembre"
                    ;;
                Oct)
                    moiss1="Octobre"
                    ;;
                Nov)
                    moiss1="Novembre"
                    ;;
                Dec)
                    moiss1="Decembre"
                    ;;
            esac
            numjourr=$(cat $1/"$2""_error.log" | tr -s " " | cut -d " " -f3 | head -1 | tail -1)
            anneee=$(cat $1/"$2""_error.log" | tr -s " " | cut -d " " -f5 | cut -d "]" -f1 | head -1 | tail -1)
            if [ -d $1/sortie ]; then
                if [ -e $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp" ]; then    
                    echo "ok"
                else
                    touch $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp"
                    (echo "ERREUR DU $jourr1 $numjourr $moiss1 $anneee :" && cat $1/"$2""_error.log" | tr -s " " | head -1000 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g' | cut -d " " -f6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35 ) > $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp"
                fi
            else
                mkdir $1/sortie
                if [ -e $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp" ]; then 
                    echo "ok"
                else
                    touch $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp"
                    (echo "ERREUR DU $jourr1 $numjourr $moiss1 $anneee :" && cat $1/"$2""_error.log" | tr -s " " | head -1000 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g' | cut -d " " -f6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35 ) > $1/sortie/$jourr1$numjourr$moiss1$anneee"_error.imp"
                fi
            fi
        ;;
        3)
            echo "calcul du nombre d'erreurs sur la journee..."
            nbr_e=$(cat $1/"$2""_error.log" | wc -l)
            echo "il y a eu $nbr_e erreurs au total dans journee"
        ;;
        4)
            echo "calcul du nombre de type d'erreurs differents..."
            nbr_te=$(cat $1/"$2""_error.log" | cut -d " " -f6 | sort | uniq | wc -l)
            echo "il y a eu $nbr_te types d'erreurs differents"
        ;;
        5)
            echo "veuillez saisir l'adresse IP :"
            read ip
            cat $1/"$2""_error.log" | grep $ip
        ;;
        6)
            echo "veuillez saisir le PID :"
            read pid
            cat $1/"$2""_error.log" | grep "pid" | grep $pid
        ;;
        7)
            echo "veuillez saisir le type d'erreur :"
            read erreur
            cat $1/"$2""_error.log" | grep $erreur | sort | uniq
        ;;
    esac
fi