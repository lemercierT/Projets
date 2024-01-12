import { Monnaie } from "./monnaie.class.ts";

const m1 = new Monnaie("euros", 250, 250);
const m2 = new Monnaie("dollars", 80, 70);
const m3 = new Monnaie("francs", 10000, 0.5);
const m4 = new Monnaie("yens", 30000, 200);

const affiche = (tab: Array<Monnaie>) => {
    tab.forEach(tableau => {
        console.log(tableau.porteFeuille());
    })
}

console.log("\n1: ");

const tab = [m1, m2, m3, m4];

tab.forEach(tab => {
    console.log(tab.porteFeuille());
})

console.log("\n2: ");
const tab100 = tab.filter(value =>
    value.valeurEuro > 100
)
affiche(tab100);

console.log("\n3: ");
tab.map(value => value.nomMonnaie).forEach(nom => {
    console.log(nom);
})

console.log("\n4: ");
console.log(tab.some(value => value.valeurEuro > 1000));

console.log("\n5: ");
console.log(tab.every(value => value.valeurEuro >= 0));

console.log("\n6: ");
affiche(tab.map(value => new Monnaie(value.nomMonnaie.toUpperCase(), value.valeuPossede, value.valeurEuro)));

console.log("\n7: ");
tab.sort((m1, m2) => m1.valeurEuro - m2.valeurEuro);
affiche(tab);

console.log("\n8: ");
tab.sort((m1, m2) => m1.nomMonnaie.localeCompare(m2.nomMonnaie));
affiche(tab);

let cumul = 0;
tab.forEach(value => cumul+=value.valeurEuro);
console.log("\n9v1:\nCumul: " + cumul);

console.log("\n9v2:\nCumul:" + tab.reduce((cumul, value) => cumul + value.valeurEuro, 0));

console.log("\n10:\nMIN: " + tab.reduce((min, value) => min < value.valeurEuro ? min : value.valeurEuro, Number.MAX_VALUE));
console.log("\n11:\nMIN: " + tab.reduce((max, value) => max > value.valeurEuro ? max : value.valeurEuro, Number.MIN_VALUE));




