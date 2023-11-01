import { Document } from "./Document.ts";
import { Auteur } from "./Auteur.ts";
import { Role } from "./Role.ts";

export class CD extends Document{
    private _styles: string;

    constructor(titre: string, editeur: string, styles: string, auteur: Map<Auteur, Array<Role | null>>){
        super(titre, editeur, auteur);
        if(styles == null) throw new Error("styles non remplie.");
        this._styles = styles;
    }  
    setStyles(styles: string){
        this._styles = styles;
    }
    getStyles(): string{
        return this._styles;
    }

    toString(): string {
      return "\n\nCD\n" + super.toString() + "\nstyle : " + this._styles;
    }
}