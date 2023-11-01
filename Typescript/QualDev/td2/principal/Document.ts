import { Auteur } from "./Auteur.ts";
import { Role } from "./Role.ts";

export class Document{
    protected _titre: string;
    protected _editeur: string;
    private _auteurs: Map<Auteur, Array<Role | null>>;

    protected constructor(titre: string, editeur: string, auteurs: Map<Auteur, Array<Role | null>>){
        this._titre = titre;
        if(editeur.length < 2) throw new Error("2 char necessaire.")
        this._editeur = editeur;
        this._auteurs = auteurs;
    }

    setTitre(titre: string){
        this._titre = titre;
    }
    getTitre(): string{
        return this._titre;
    }
    setEditeur(editeur: string){
        this._editeur = editeur;
    }
    getEditeur(): string{
        return this._editeur;
    }
    setAuteurs(auteurs: Map<Auteur, Array<Role | null>>){
        this._auteurs = auteurs;
    }
    getAuteurs(): Map<Auteur, Array<Role | null>>{
        return this._auteurs;
    }

    write_string(): string{
        let string = "";
        this._auteurs.forEach(auteur => {
            string+=auteur;
        })

        return string;
    }

    toString(): string{
        return "titre : " + this._titre + "\nediteur : " + this._editeur + "\nauteur/role : " + this.write_string();
    }
}