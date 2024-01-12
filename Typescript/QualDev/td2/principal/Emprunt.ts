import { Adherent } from "./Adherent.ts";
import { Document } from "./Document.ts";

export class Emprunt{
    private _dateEmprunt: Date;
    private _dateRetour: Date;
    private _adherent: Adherent;
    private _arrayDocs: Array<Document>;

    constructor(dateEmprunt: Date, dateRetour: Date, emprunteur: Adherent, documents: Array<Document>){
        this._dateEmprunt = dateEmprunt;
        this._dateRetour = dateRetour;
        this._adherent = emprunteur;
        this._arrayDocs = documents;
    }

    setDateEmprunt(dateEmprunt: Date){
        this._dateEmprunt = dateEmprunt;
    }
    getDateEmprunt(): Date{
        return this._dateEmprunt;
    }
    setDateRetour(dateRetour: Date){
        this._dateRetour = dateRetour;
    }
    getDateRetourt(): Date{
        return this._dateRetour;
    }
    setAdh(adh: Adherent){
        this._adherent = adh;
    }
    getAdh(): Adherent{
        return this._adherent;
    }
    setArrayDocs(arrayDocs: Array<Document>){
        this._arrayDocs = arrayDocs;
    }
    getArrayDocs(): Array<Document>{
        return this._arrayDocs;
    }

    toString(): string{
        return this._dateEmprunt + " " + this._dateRetour + " " + this._adherent + " " + this._arrayDocs;
    }
}