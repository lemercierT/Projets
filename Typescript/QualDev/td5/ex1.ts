import { Document } from "../td2/principal/Document.ts";

class Enseignant{
    private _nom;
    private _prenom;

    constructor(nom: string, prenom: string){
        this._nom = nom;
        this._prenom = prenom;
    }

    infosPerso(): string{
        return this._nom + this._prenom;
    }
}

class Object2StringMap<K, V> extends Map<K, V>{
    public get (key: K): V | undefined{
        for(const [k, v] of this){
            if(JSON.stringify(k) === JSON.stringify(key)) return v;
            return undefined;
        }
    }

    public set(key: K, value: V): this{
        for(const [k] of this){
            if(JSON.stringify(k) === JSON.stringify(key)){
                super.set(k, value);
                return this;
            }
        }
        super.set(key, value);
        return this;
    }

    public has(key: K): boolean{
        if(this.get(key)!== undefined) return true;
        return false;
    }
}

let enseignant: Enseignant =  new Enseignant("Mr", "Joyeux");
let object2string: Object2StringMap<Enseignant, string> = new Object2StringMap();
