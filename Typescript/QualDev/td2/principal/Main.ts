import { Personne } from "./Personne.ts";
import { Adherent } from "./Adherent.ts";
import { Auteur } from "./Auteur.ts";
import { Role } from "./Role.ts";
import { Livre } from "./Livre.ts";
import { CD } from "./CD.ts";
import { Bibliotheque } from "./Bibliotheque.ts";
import { Emprunt } from "./Emprunt.ts";
import { Document } from "./Document.ts";

let personne = new Adherent("15", "Titi", "Test");
console.log(personne.toString());

let role = new Role("Thibault, 20 ans, 3 ans d'experience", "auteur principal");
let role1 = new Role("Thomas, 21 ans, 3 ans d'experience", "traducteur");
let role3 = new Role("Jeremy, 24 ans", "compositeur")
let auteur = new Auteur("Jeff", "Debruche");
let auteur1 = new Auteur("Lola", "Legrand");;
let auteur3 = new Auteur("Eminem", "Emy");

console.log(auteur.toString());

let auteurRole: Map<Auteur, Array<Role | null>> = new Map();
auteurRole.set(auteur, [role])
auteurRole.set(auteur1, [role1]);
auteurRole.set(auteur3, [role3]);

let livre = new Livre("lechat", "JulesV", "Tome1", auteurRole);
console.log(livre.toString());

let cdRole: Map<Auteur, Array<Role | null>> = new Map();
cdRole.set(auteur3, [role3]);
cdRole.set(auteur, [role]);
cdRole.set(auteur1, [role1]);


let cd = new CD("Diamonds", "Label5", "Chant", cdRole);
console.log(cd.toString());

let arrayDocs: Array<Document> = [];
let arrayAdh: Array<Adherent> = [];
let bibliotheque = new Bibliotheque(arrayDocs, arrayAdh);
let adh0 = new Adherent("0", "Lemercier", "Thibault");
bibliotheque.ajouteAdherent(adh0);
bibliotheque.ajouteDoc(cd);
bibliotheque.supprimeAdherent(adh0);
bibliotheque.supprimeDoc(cd);

let dossier :Array<Document> = [cd];
let emprunt = new Emprunt(new Date(2023, 1, 10),new Date(2023, 1, 17), adh0, dossier);
console.log(emprunt.toString());




