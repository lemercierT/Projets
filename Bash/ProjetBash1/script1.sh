#!/bin/bash

if [ -e "$1"/access.log ]; then
    for((i=1;i<2;i++));
    do
        annee=$(cat "$1"/access.log | tr -s " " | cut -d " " -f3 | cut -d "/" -f3 | cut -d ":" -f1 | head -"$i" | tail -1)
        if [ -d "$1"/"$annee" ]; then
            echo "ok"
        else
            mkdir "$1"/"$annee"
        fi

        mois=$(cat "$1"/access.log | tr -s " " | cut -d " " -f3 | cut -d "/" -f2 | head -"$i" | tail -1)
        case $mois in
        Jan)
            mois1=01
            ;;
        Feb)
            mois1=02
            ;;
        Mar)
            mois1=03
            ;;
        Apr)
            mois1=04
            ;;
        May)
            mois1=05
            ;;
        Jun)
            mois1=06
            ;;
        Jul)
            mois1=07
            ;;
        Aug)
            mois1=08
            ;;
        Sep)
            mois1=09
            ;;
        Oct)
            mois1=10
            ;;
        Nov)
            mois1=11
            ;;
        Dec)
            mois1=12
            ;;
        esac

        if [ -d "$1"/"$annee"/"$mois1" ]; then
            echo "le repertoire existe"
        else
            mkdir "$1"/"$annee"/"$mois1"
        fi

        jour=$(cat "$1"/access.log | tr -s " " | cut -d " " -f3 | cut -d "/" -f1 | cut -d "[" -f2 | head -"$i" | tail -1)
        if [ -e "$1"/"$annee"/"$mois1"/"$jour""_access.log" ]; then
            cp "$1"/access.log "$1"/"$annee"/"$mois1"/"$jour""_access.log"
        else
            touch "$1"/"$annee"/"$mois1"/"$jour""_access.log"
            cp "$1"/access.log "$1"/"$annee"/"$mois1"/"$jour""_access.log"
        fi
   
    done
fi

o=0
                    
for((an=1;an<99;an++));
do
    for((ms=1;ms<13;ms++));
    do  
        for((jr=1;jr<32;jr++));
        do
            j=$jr   
            if [ $jr -lt 10 ]; then
                j=$o$jr
            fi
                 
            m=$ms
            if [ $ms -lt 10 ]; then
                m=$o$ms
            fi
    
            a=$an
            if [ $an -lt 10 ]; then
                a=$o$an
            fi
            
            if [ -e $1/"error_"$j$m$a".log" ]; then
                if [ -d $1/20$a ]; then
                    echo ""
                else
                    mkdir $1/21$a
                fi
                
                if [ -d $1/20$a/$m ]; then
                    echo ""
                else
                    mkdir $1/20$a/$m
                fi
                
                if [ -e $1/20$a/$m/$j"_error.log" ]; then
                    echo "fichier existant"
                else
                    touch $1/20$a/$m/$j"_error.log"
                    cp $1/"error_"$j$m$a".log" $1/20$a/$m/$j"_error.log"
                fi
            fi
        done  
    
    done
            
done
           
    