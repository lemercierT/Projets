#!/bin/bash

o=0
if [ -d "$1"/"$2" ]; then
    echo "QUE SOUHAITEZ VOUS FAIRE :"
    echo "(1) afficher la totalitee des erreurs sur le mois : "
    echo "(2) afficher la totalitee des erreurs et les sauvegarder dans un fichier .imp : "
    echo "(3) calculer le nombre d'erreurs sur le mois : "
    echo "(4) calculer le nombre de type d'erreurs differents sur le mois : "
    echo "(5) saisir une adresse IP et obtenir les erreurs enregistree pour cette adresse : "
    echo "(6) saisir un PID et obtenir les erreurs correspondantes : "
    echo "(7) saisir un type d'erreur et afficher les differents messages d'erreurs correspondants : "
    read rep
    case $rep in 
        1)
            echo "affichage de la totalitee des erreurs sur le mois..."
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    jour=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f3 | sort | uniq)
                    mois=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f2 | sort | uniq)
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
                    annee=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f5 | cut -d "]" -f1 | sort | uniq)
                    echo " "
                    echo " "
                    echo "ERREUR DU $jour $mois1 $annee : "
                    cat "$1"/"$2"/"$li""_error.log" | cut -d "]" -f2,3,4,5,6,7,8,9 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g' 
                    echo " "
                    echo " "
                    echo " "
                    echo " "
                fi
                    
            done
            
            
        ;;
        2)
            echo "chargement de la totalitee des erreurs sur le mois..."
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    jour=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f3 | sort | uniq)
                    mois=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f2 | sort | uniq)
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
                    annee=$(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f5 | cut -d "]" -f1 | sort | uniq)
                    if [ -d "$1"/"sortie_error" ]; then
                        if [ -e "$1"/"sortie_error"/"erreur_du_$jour$mois1$annee.imp" ]; then
                            (echo "ERREUR DU $jour $mois1 $annee : " && cat "$1"/"$2"/"$li""_error.log" | cut -d "]" -f2,3,4,5,6,7,8,9 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g') >> "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                        else
                            touch "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                            (echo "ERREUR DU $jour $mois1 $annee : " && cat "$1"/"$2"/"$li""_error.log" | cut -d "]" -f2,3,4,5,6,7,8,9 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g') >> "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                        fi
                    else
                        mkdir "$1"/"sortie_error"
                        if [ -e "$1"/"sortie_error"/"erreur_du_$jour$mois1$annee.imp" ]; then
                            (echo "ERREUR DU $jour $mois1 $annee : " && cat "$1"/"$2"/"$li""_error.log" | cut -d "]" -f2,3,4,5,6,7,8,9 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g') >> "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                        else
                            touch "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                            (echo "ERREUR DU $jour $mois1 $annee : " && cat "$1"/"$2"/"$li""_error.log" | cut -d "]" -f2,3,4,5,6,7,8,9 | sed 's:\[::g' | sed 's:]::g' | sed 's:\:::g') >> "$1"/"sortie_error"/"erreur_du_$jour$mois$annee.imp"
                        fi

                    fi
                fi
            done

        ;;
        3)
            echo "calcul du nombre d'erreur sur le mois..."
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    nbr_erreur=$(($nbr_erreur + $(cat "$1"/"$2"/"$li""_error.log" | wc -l)))
                fi
            done
            echo "Il y a eu $nbr_erreur erreurs durant le mois"

        ;;
        4)
            echo "calcul du nombre de types d'erreurs differents sur le mois..."
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    nbr_type_erreur=$(($nbr_type_erreur + $(cat "$1"/"$2"/"$li""_error.log" | cut -d " " -f6 | sort | uniq | wc -l)))
                fi
            done
            echo "il y a eu $nbr_type_erreur types d'erreurs differents durant le mois"
        ;;
        5)
            echo "veuillez saisir l'IP : "
            read ip
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    cat "$1"/"$2"/"$li""_error.log" | grep $ip | tr -s " " 
                fi
            done
            
        ;;
        6)
            echo "veuillez saisir le PID : "
            read pid
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    cat "$1"/"$2"/"$li""_error.log" | grep "pid" | grep $pid | tr -s " " 
                fi
            done

        ;;
        7)
            echo "veuillez saisir le type d'erreur : "
            read typeerr
            for((i=0;i<32;i++));
            do
                li=$i
                if [ $li -lt 10 ]; then
                    li=$o$li
                fi

                if [ -e "$1"/"$2"/"$li""_error.log" ]; then
                    cat "$1"/"$2"/"$li""_error.log" | grep $typeerr | tr -s " "  | sort | uniq
                fi
            done


        ;;
    esac
fi