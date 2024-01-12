import { Personne } from "./Personne.ts";
import { Role } from "./Role.ts";

export class Auteur extends Personne {

  constructor(nom: string, prenom: string = "") {
    super(nom, prenom);
  }

  set prenom(prenom: string) {
      this._prenom = prenom.trim();
  }
  get prenom(): string {
    return this._prenom;
  }

  toString(): string {
    if(this._prenom == ""){
      return this._nom;
    }else{
      return super.toString();
    }
  }
}


