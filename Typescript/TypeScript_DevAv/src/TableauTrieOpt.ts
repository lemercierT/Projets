function nombreAleatoire(n: number): number {
  return Math.floor(Math.random() * n) + 1;
}

class TableauTrie {
  private tab_: Array<number> = [];

  constructor(taille = 0) {
    for (let i = 0; i < taille; ++i) this.tab_.push(nombreAleatoire(taille * 10));
    this.tab_.sort((x, y) => x - y);
  }

  taille(): number{
    return this.tab_.length;
  }

  afficher_tab(): void{
    console.log(this.tab_);
  }

  pushRight(value: number): void{
    this.tab_.unshift(value);
    for(let i = 0; i < this.taille(); i++){
      if(this.tab_[i] > this.tab_[i + 1]){
        do{
          let temp = this.tab_[i];
          this.tab_[i] = this.tab_[i + 1];
          this.tab_[i + 1] = temp;
          i++;
        }while(this.tab_[i] > this.tab_[i + 1]);
      }
    }
  }

  pushLeft(value: number): void{
    this.tab_.push(value);
    for(let i = this.taille(); i >= 0; i--){
      if(this.tab_[i] < this.tab_[i - 1]){
        do{
          let temp = this.tab_[i];
          this.tab_[i] = this.tab_[i - 1];
          this.tab_[i - 1] = temp;
          i--;
        }while(this.tab_[i] < this.tab_[i - 1]);
      }
    }
  }

  push(value: number): void{
    let middle = Math.floor(this.taille() / 2);
    if(value < middle){
      this.pushRight(value);
    }else{
      this.pushLeft(value);
    }
  }

  valeur(indice: number): number{
    if(this.tab_[indice] != null){
      return this.tab_[indice]; 
    }else{
      throw new Error("aucune valeur");
    }
  }

  trie_tab(): void{
    for(let i = 0; i < this.tab_.length; i++){
      if(this.tab_[i] > this.tab_[i + 1]){
        let temp = this.tab_[i];
        this.tab_[i] = this.tab_[i + 1];
        this.tab_[i + 1] = temp;
        this.trie_tab();
      }
    }
  }

  retirer(indice: number): void{
    if(indice > this.tab_.length){
      throw new Error("indice invalide")
    }else{
      for(let i = indice; i < this.tab_.length; i++){
        this.tab_[i] = this.tab_[i + 1];
      }
    }
    this.tab_.pop();
  }

  modification(valeur: number, indice: number): void{
    this.tab_[indice] = valeur;
    this.trie_tab();
  }

  recherche_indice(value: number): number{
    for(let i = 0; i < this.tab_.length; i++){
      if(this.tab_[i] == value){
        return i;
      }
    }
    return -1;
  }
}

let tab = new TableauTrie(10);
let taille_tab = tab.taille();
console.log("taille du tableau :", taille_tab);
tab.afficher_tab();
tab.pushRight(60);
tab.pushLeft(20);
let indice_val = tab.valeur(8);
console.log("valeur à l'indice 8 est : ", indice_val);
tab.afficher_tab();
tab.retirer(8);
tab.afficher_tab();
tab.modification(0, 9);
tab.afficher_tab();
let indice_value = tab.recherche_indice(60);
console.log("indice de la valeur : ", indice_value);
