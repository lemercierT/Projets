import { ItérateurListeChaînée } from "./ListeChainee.ts";

class MaillonDC{
    private _valeur: number;
    private _predecesseur: MaillonDC | null;
    private _sucesseur: MaillonDC | null;

    constructor(valeur: number, predecesseur: MaillonDC | null = null, sucesseur: MaillonDC | null = null){
        this._valeur = valeur;
        this._predecesseur = predecesseur;
        this._sucesseur = sucesseur;
    }

    set valeur(valeur: number){
        this._valeur = valeur;
    }
    get valeur(): number{
        return this._valeur;
    }
    set predecesseur(predecesseur: MaillonDC | null){
        this._predecesseur = predecesseur;
    }
    get predecesseur(): MaillonDC | null{
        return this._predecesseur;
    }
    set sucesseur(sucesseur: MaillonDC | null){
        this._sucesseur = sucesseur;
    }
    get sucesseur(): MaillonDC | null{
        return this._sucesseur;
    }
}

class ListeDoublementChainee{
    private _tete: MaillonDC | null = null;
    private _fin: MaillonDC | null = null;

    estVide(): boolean{
        return this._tete == null && this._fin == null;
    }

    getValeurTete(): number{
        if(this.estVide()) throw new Error("liste vide.")
        else return this._tete!.valeur;
    }

    affichage(): void{
        let aux = this._tete;
        while(aux){
            console.log(aux.valeur);
            aux = aux.sucesseur;
        }
    }

    ajouterDebut(valeur: number): void{
        let newMaillon = new MaillonDC(valeur, null, this._tete!);
        if(this.estVide()){
            this._fin = newMaillon;
        }else{
            this._tete!.predecesseur = newMaillon;
        }
        this._tete = newMaillon;
    }

    ajouterFin(valeur: number): void{
        let newMaillon = new MaillonDC(valeur, this._fin, null);
        if(this._tete === null) this._fin = newMaillon;
        else this._fin!.sucesseur = newMaillon;
        
        this._fin = newMaillon;
    }

    ajouterDeb(valeur: number): void{
        let newMaillon = new MaillonDC(valeur, null, this._tete);

        if(this._tete == null) this._fin = newMaillon;
        else this._tete.predecesseur = newMaillon;

        this._tete = newMaillon;
    }

    retirerDebut(): void{
        if(this.estVide()) throw new Error("Liste vide");  
  
        this._tete = this._tete!.sucesseur
        if(!this._tete) this._fin = null;
        else this._tete.predecesseur = null;
      }
  
    retirerFin(): void{
        if(this.estVide()) throw new Error("Liste vide");  
  
        this._fin = this._fin!.predecesseur
        if(!this._fin) this._tete=null
        else this._fin.sucesseur = null
      }

    rechercheValeur(valeur: number): MaillonDC | null{
        let temp_valeur = this._tete;
        while(temp_valeur && temp_valeur.valeur != valeur){
            temp_valeur = temp_valeur.sucesseur;
        }
        return temp_valeur;
    }
}

let listedoublechainee = new ListeDoublementChainee();
listedoublechainee.ajouterDeb(10);
listedoublechainee.ajouterDeb(20);
listedoublechainee.ajouterDeb(30);
listedoublechainee.ajouterDeb(40);
listedoublechainee.ajouterFin(100);

console.log(listedoublechainee);
if(listedoublechainee.rechercheValeur(30) == null) console.log("true");
else console.log("false");
listedoublechainee.affichage();
