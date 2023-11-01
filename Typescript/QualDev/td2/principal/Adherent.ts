import { Personne } from "./Personne.ts";

export class Adherent extends Personne {
  private _numero: string;
  constructor(numero: string, nom: string, prenom: string) {
    super(nom, prenom);
    this._numero = "erreur";
    if (numero >= "0" && numero <= "9") this._numero = numero;
  }

  setNumero(numero: string) {
    this._numero = numero;
  }
  getNumero(): string {
    return this._numero;
  }

  toString(): string {
    return this._numero + " " + super.toString();
  }
}
