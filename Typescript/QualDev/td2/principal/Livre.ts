import { Document } from "./Document.ts";
import { Auteur } from "./Auteur.ts";
import { Role } from "./Role.ts";

export class Livre extends Document{
    private _collections: string;

    constructor(titre: string, editeur: string, collection: string, auteurs: Map<Auteur, Array<Role | null>>){
        super(titre, editeur, auteurs);
        if(collection.length < 2) throw new Error("collection taille < 2.")
        this._collections = collection;
    }
    setCollection(collection: string){
        this._collections = collection;
    }
    getCollection(): string{
        return this._collections;
    }

    toString(): string {
      return "LIVRE" + "\n" + super.toString() + "\ncollection : " + this._collections;
    }
}