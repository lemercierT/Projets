export class Maillon {
    private donnée_: number;
    private suivant_: Maillon | null;
  
    constructor(donnée: number, suivant: Maillon | null = null) {
      this.donnée_ = donnée;
      this.suivant_ = suivant;
    }
  
    get donnée(): number {
      return this.donnée_;
    }
  
    set donnée(valeur: number) {
      this.donnée_ = valeur;
    }
  
    get suivant(): Maillon | null {
      return this.suivant_;
    }
  
    set suivant(valeur: Maillon | null) {
      this.suivant_ = valeur;
    }
  }

let chaine = new Maillon(10, new Maillon(40, new Maillon(20, null)));
let m3 = new Maillon(20, null);
let m2 = new Maillon(40, m3);
let m1 = new Maillon(10, m2);


console.log(chaine);

while(m1 != null){
    console.log(m1.donnée);
    m1 = m1.suivant!;
}

while(chaine != null){
  console.log(chaine.donnée);
  chaine = chaine.suivant!;
}
