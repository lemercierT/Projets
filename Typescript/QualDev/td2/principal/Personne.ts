export class Personne {
  protected _nom: string;
  protected _prenom: string;

  protected constructor(nom: string, prenom: string) {
    this._nom = nom;
    this._prenom = prenom;
  }
  setNom(nom: string) {
    this._nom = nom;
  }
  getNom(): string {
    return this._nom;
  }
  setPrenom(prenom: string) {
    this._prenom = prenom;
  }
  getPrenom(): string {
    return this._prenom;
  }

  toString(): string {
    return this._nom + " " + this._prenom;
  }
}
