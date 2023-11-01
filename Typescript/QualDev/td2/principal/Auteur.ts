import { Personne } from "./Personne.ts";
import { Role } from "./Role.ts";

export class Auteur extends Personne {

  constructor(nom: string, prenom: string = "") {
    super(nom, prenom);
  }

  toString(): string {
    return super.toString();
  }
}
