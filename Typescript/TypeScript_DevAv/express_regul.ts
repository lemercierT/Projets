let string = "aeq3";
let express_regul = /^[a-b][d-f][p-r][1-5]$/;
if(express_regul.test(string)) console.log("passed");
else console.log("no passed");


function verif_lettre(chaine: string): void{
    let express_regul = /^[a-z]$/;
    let passed = "";
    let no_passed = "";
    for(let i = 0; i < chaine.length; i++){
        if(express_regul.test(chaine[i])) passed+=chaine[i]
        else no_passed+=chaine[i];
    }
    console.log("passed : ", passed, "\nno passed : ", no_passed);
}

function verif_chiffre(chaine: string): void{
    let express_regul = /^[0-9]$/;
    let passed = "";
    let no_passed = "";
    for(let i = 0; i < chaine.length; i++){
        if(express_regul.test(chaine[i])) passed+=chaine[i]
        else no_passed+=chaine[i];
    }
    console.log("passed : ", passed, "\nno passed : ", no_passed);
}

let string1 = "abcd4ef6hd78gd3";
verif_lettre(string1 + "\n");
verif_chiffre(string1 + "\n");

let string2 = "bacde543acbab";
let string3 = "bacde543a6bab";
let express_regul1 = /^[abcdef12345]{13}$/;

if(string2.match(express_regul1)) console.log("passed 1");
else console.log("no passed 1");

if(string3.match(express_regul1)) console.log("passed 2"); //No passed normal.
else console.log("no passed 2");

let string4 = "abcdefg123456";
let string4_size = string4.length - 1;
let express_regul2 = new RegExp(`[abcdefg123456]{${string4_size}}`);

if(string4.match(express_regul2)) console.log("passed 3");
else console.log("no passed 3");

