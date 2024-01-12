import { Document } from "./Document.ts";
import { Adherent } from "./Adherent.ts";

export class Bibliotheque{
    private _arrayDocs: Array<Document>;
    private _arrayAdh: Array<Adherent>;

    constructor(array_document: Array<Document>, array_adherents: Array<Adherent>){
        this._arrayDocs = array_document;
        this._arrayAdh = array_adherents;
    }

    setArrayDocs(arrayDocs: Array<Document>){
        this._arrayDocs = arrayDocs;
    }
    getArrayDocs(): Array<Document>{
        return this._arrayDocs;
    }
    setArrayAdh(arrayAdh: Array<Adherent>){
        this._arrayAdh = arrayAdh;
    }
    getArrayAdh(): Array<Adherent>{
        return this._arrayAdh;
    }

    ajouteAdherent(adh: Adherent): void{
        this._arrayAdh.push(adh);
    }
    supprimeAdherent(adh: Adherent): void{
        if(this._arrayAdh.indexOf(adh) != -1) this._arrayAdh.splice(this._arrayAdh.indexOf(adh), 1);
    }

    ajouteDoc(doc: Document): void{
        this._arrayDocs.push(doc);
    }
    supprimeDoc(doc: Document): void{
        if(this._arrayDocs.indexOf(doc) != -1) this._arrayDocs.splice(this._arrayDocs.indexOf(doc), 1);
    }

    toString(): Array<Document | Adherent>{
        return this._arrayDocs;
    }
}