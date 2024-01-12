function nombreAleatoire(n: number): number {
  return Math.floor(Math.random() * n) + 1;
}

class TableauTrie {
  private tab_: Array<number> = [];
  private cout_ = 0;

  constructor(taille = 0) {
    for (let i = 0; i < taille; ++i) this.tab_.push(nombreAleatoire(taille * 10));
    this.tab_.sort((x, y) => x - y);
  }

  get cout(): number {
    return this.cout_;
  }
  recherche(e: number, algo: string): number {
    this.cout_ = 0;
    if (algo === "seq") return this.sequentielle(e) + this.cout_;
    else if (algo === "dichoIt") return this.dichotomique(e) + this.cout_;
    else return this.recursive_dichotomique(e) + this.cout_;
}

  taille(): number {
    return this.tab_.length;
  }

  afficher(): void {
    for (let i = 0; i < this.tab_.length; i++) {
      console.log("tab[", +i + "] = ", this.tab_[i]);
    }
  }

  afficher_tab(): void {
    this.tab_.forEach((valeur) => {
      console.log(valeur);
    });
  }

  return_valeur(indice: number): number {
    return this.tab_[indice];
  }

  retirer_indice(indice: number) {
    this.tab_.splice(indice, 1);
  }

  retirer(indice: number) {
    for (let i = indice; i < this.tab_.length; i++) {
      this.tab_[i] = this.tab_[i + 1];
    }
    this.tab_.pop();
  }

  ajouter_valeur(valeur: number): void{
    this.tab_.push(valeur);
    this.trie_tab();
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

  modification(indice: number, value: number){
    this.tab_[indice] = value;
    this.trie_tab();
  }

  recherche_value(nombre: number): number{
    for(let i = 0; i < this.tab_.length; i++){
      if(this.tab_[i] == nombre) return i;
    }
    return -1;
  }

  sequentielle(value: number): number{
    for(let i = 0; i < this.tab_.length; i++){
      if(this.tab_[i] == value) return i;
      this.cout_++;
    }
    return -1;
  }

  dichotomique(value: number): number{
    let milieu = Math.floor(this.tab_.length / 2);
    if(value > this.tab_[milieu]){
      do{
        milieu = Math.floor((milieu + this.tab_.length) / 2);
        if(this.tab_[milieu] == value){
          return milieu;
        }else if(value < this.tab_[milieu]){
          return -1;
        }
        this.cout_++;
      }while(1);
    }else if(value < this.tab_[milieu]){
      do{
        milieu = Math.floor((this.tab_.length - milieu) / 2);
        if(this.tab_[milieu] == value){
          return milieu;
        }else if(value > this.tab_[milieu]){
          return -1;
        }
        this.cout_++;
      }while(1)
    }else if(value == this.tab_[milieu]){
      return milieu;
    }

    return 0;
  }

  dichotomique_recursive(value: number): number{
    let milieu = Math.floor(this.tab_.length / 2);
    if(value > this.tab_[milieu]){
      milieu = Math.floor((milieu + this.tab_.length) / 2);
      if(value < this.tab_[milieu]){
        return -1;
      }
      if(this.tab_[milieu] == value){
        return milieu;
      }else{
        return this.dichotomique_recursive(value);
      }
    }else if(value < this.tab_[milieu]){
      milieu = Math.floor((milieu - this.tab_.length) / 2);
      if(value > this.tab_[milieu]){
        return -1;
      }
      if(this.tab_[milieu] == value){
        return milieu;
      }else{
        return this.dichotomique_recursive(value);
      }
    }else if(value == this.tab_[milieu]){
      return milieu;
    }else{
      return -1;
    }
  }

  recursive_dichotomique(value: number, debut: number = 0, fin: number = this.tab_.length): number{
    if(debut <= fin){
      let milieu = Math.floor((debut + fin) / 2);
      if(this.tab_[milieu] == value){
        return milieu;
      }else if(value > this.tab_[milieu]){
        this.cout_++;
        return this.recursive_dichotomique(value, milieu + 1, fin); //return this.recursive_dichotomique(value, debut + 1, fin);
      }else if(value < this.tab_[milieu]){
        this.cout_++;
        return this.recursive_dichotomique(value, debut, milieu - 1); //return this.recursive_dichotomique(value, debut, fin - 1);
      }else{
        return -1;
      }
    }
    return 0;
    
  }
}

let tab = new TableauTrie(10);
tab.afficher();
let valeur = tab.return_valeur(5);
console.log(valeur);
tab.retirer(5);
tab.afficher();
tab.modification(5, 11);
console.log("--------------");
tab.afficher();
tab.ajouter_valeur(100);
console.log("\n");
tab.afficher();
let temp = tab.recherche_value(11);
console.log("--------------");
//temp = tab.dichotomique(20);
//tab.dichotomique_recursive(11)
console.log("--------------");
temp = tab.recursive_dichotomique(11);
console.log(temp);
temp = tab.recherche(100, "aaa");
console.log("nombre itération : ", temp);




