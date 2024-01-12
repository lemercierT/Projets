import { AssertionError } from "https://deno.land/std@0.201.0/assert/assertion_error.ts";
import { Personne } from "./Personne.ts";

export class Adherent extends Personne {
  private _numero!: string;
  
  constructor(numero: string, nom: string, prenom: string) {
    super(nom, prenom);
    this.numero = numero;
  }

  set numero(numero: string) {
    if (numero.match(/^[0-9]+$/)){
      this._numero = numero;
    }else{
      throw new Error("Constructeur erreur numero");
    }
  }
  get numero(): string {
    return this._numero;
  }

  toString(): string {
    return this._numero + " " + super.toString();
  }
}
