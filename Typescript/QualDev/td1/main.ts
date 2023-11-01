function estMin(lettre: string): boolean{
    if(lettre >= 'a' || lettre < 'A') return true;

    return false;
}

function verif_chaine(chaine: Array<string>): boolean{
    for(let i = 0; i < chaine.length; i++){
        if(estMin(chaine[i])) return false;
    }

    return true;
}

class ChainePerso{

    return_string(): void{
        let string;
        do{
            string = prompt("Veuillez saisir une chaîne : ");
        }while(string == undefined);
        console.log(string);
    }

    genere_aleatoire(taille_chaine: number): Array<string>{
        let tab_voyelle = ['a', 'e', 'i', 'o', 'u', 'y', 'A', 'E', 'I', 'O', 'U', 'Y'];
        let tab_string = [''];
        let voyelle_size = tab_voyelle.length - 1;
        for(let i = 1; i < taille_chaine; i++){
            tab_string[i] = tab_voyelle[Math.floor(Math.random() * voyelle_size) + 1];
        }
        tab_string.shift();
        return tab_string;
    } 

    crypt_string(chaine: string): Array<string>{
        let tab_temp = [''];
        let crypt_letter = ['A', 'B', 'E', 'G', 'I', 'O', 'S', 'Z'];
        let crypt_number = ['4', '8', '3', '6', '1', '0', '5', '2'];
        for(let i = 0; i < chaine.length; i++){
            if(crypt_letter.indexOf(chaine[i]) != -1){
                let temp = crypt_number[crypt_letter.indexOf(chaine[i])];
                tab_temp.push(temp);
                
            }
        }
        tab_temp.shift();
        return tab_temp;
    }
    
    genere_chaine(): void{
        let nbr_essai = 0;
        let temp_chaine = [''];
        let valide = 0;
        do{
            for(let i = 1; i < 6; i++){
                let temp = 65 + Math.random() * (123 - 65);
                temp_chaine.push(String.fromCharCode(temp))
            }
    
             if(verif_chaine(temp_chaine)){
                    console.log("Tentative numéro", nbr_essai, "chaine = ", temp_chaine);
                    valide = 1;
                }else{
                    console.log("Tentative numéro", nbr_essai, "chaine = ", temp_chaine);
                    temp_chaine = [];
                }
    
            nbr_essai++;
        }while(valide < 1);
    }
}

let chaine = new ChainePerso();
chaine.return_string();
console.log(chaine.genere_aleatoire(20));
console.log(chaine.crypt_string("ABEGIOSZ"));
chaine.genere_chaine();