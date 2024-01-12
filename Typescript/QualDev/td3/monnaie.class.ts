export class Monnaie{
    private _nom_monnaie!: string;
    private _valeur_possede!: number;
    private _valeur_conv_euro!: number;

    constructor(nom_monnaie: string, valeur_possede: number, valeur_conv_euro: number){
        this._nom_monnaie = nom_monnaie;
        this._valeur_possede = valeur_possede;
        this._valeur_conv_euro = valeur_conv_euro;
    }
    get nomMonnaie(): string{
        return this._nom_monnaie;
    }
    set nomMonnaie(nom_monnaie: string){
        this._nom_monnaie = nom_monnaie;
    }
    get valeuPossede(): number{
        return this._valeur_possede;
    }
    set valeurPossede(valeur_possede: number){
        this._valeur_possede = valeur_possede;
    }
    get valeurEuro(): number{
        return this._valeur_conv_euro;
    }
    set valeurEuro(valeur_conv_euro: number){
        this._valeur_conv_euro = valeur_conv_euro;
    }

    porteFeuille(): string{
        return `${this._nom_monnaie} : ${this._valeur_possede} : ${this._valeur_conv_euro}`;
    }
}
