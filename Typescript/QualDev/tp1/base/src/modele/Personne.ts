export class Personne {
  protected _nom!: string;
  protected _prenom!: string;

  protected constructor(nom: string, prenom = "") {
    this.nom = nom;
    this.prenom = prenom;
  }
  set nom(nom: string){
    if(nom.trim().length < 1){
      throw new Error("Constructeur erreur nom.")
    }else{
      this._nom = nom.trim();  
    }
  }
  get nom(): string{
    return this._nom;
  }

  set prenom(prenom: string) {
    if(prenom.trim().length < 1 ){
      throw new Error("Constructeur erreur nom.")
    }else{
    this._prenom = prenom.trim();
    }
  }
  get prenom(): string {
    return this._prenom;
  }

  toString(): string {
    return this._nom + ", " + this._prenom;
  }
}
