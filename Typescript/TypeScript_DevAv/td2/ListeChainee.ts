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

export class ListeChaînée {
  private tête_: Maillon | null = null; // Initialement la liste est vide
  private _fin: Maillon | null = null;

  get tête(): Maillon | null {
    return this.tête_;
  }

  get fin(): Maillon | null{
    return this._fin;
  }

  estVide(): boolean {
    // La liste est vide ssi tête_ vaut null
    return this.tête_ === null;
  }

  ajouter(v: number): void {
    let nouveauMaillon = new Maillon(v, this.tête_);
    if(this.estVide()) this._fin = nouveauMaillon;
    this.tête_ = nouveauMaillon;
  }

  get valeurTête(): number {
    if (this.estVide()) throw new Error("Liste vide");
    return this.tête_!.donnée;
  }

  get suite(): Maillon | null {
    if (this.estVide()) throw new Error("Liste vide");
    return this.tête_!.suivant;
  }

  retirer(): void {
    if (this.estVide()) throw new Error("Liste vide");
    this.tête_ = this.tête_!.suivant;
  }

  recherche(v: number): ItérateurListeChaînée {
    let it = new ItérateurListeChaînée(this);
    it.recherche(v);
    return it;
  }

  rechercheBis(v: number): Maillon | null {
    let aux = this.tête_;
    let trouvé = false;

    while (aux != null && !trouvé)
      if (aux.donnée === v) trouvé = true;
      else aux = aux.suivant;

    return aux;
  }

  affichage(): void {
    let it = new ItérateurListeChaînée(this);

    while (!it.fin()) {
      console.log(it.valeurCourante);
      it.avancer();
    }
  }

  ajouterFin(v: number): void {
    if(this.estVide()){
      let new_maillon = new Maillon(v, this.tête_);
      this.tête_ = new_maillon;
      this._fin = new_maillon;
    }else{
      let nouveau_maillon = new Maillon(v, null);
      this._fin!.suivant = nouveau_maillon;
      this._fin = nouveau_maillon;
    }
  }

  ajouterFin2(v: number): void{
    let it = new ItérateurListeChaînée(this);
  }
}

export class ItérateurListeChaînée {
  private liste_: ListeChaînée;
  private ptr_: Maillon | null;

  constructor(liste: ListeChaînée) {
    this.liste_ = liste;
    this.ptr_ = liste.tête;
  }

  get courant(): Maillon | null {
    return this.ptr_;
  }

  get valeurCourante(): number {
    if (this.fin()) throw new Error("Fin de liste");
    return this.ptr_!.donnée;
  }

  fin(): boolean {
    return this.ptr_ === null;
  }

  debut(): boolean {
    return this.ptr_ === this.liste_.tête;
  }

  avancer(): void {
    if (this.fin()) throw new Error("Fin de liste");
    this.ptr_ = this.ptr_!.suivant;
  }

  ajouterAprès(v: number): void {
    if (this.fin()) throw new Error("Fin de liste");
    let nouveauMaillon = new Maillon(v, this.ptr_!.suivant);
    this.ptr_!.suivant = nouveauMaillon;
  }

  recherche(v: number): void {
    let trouvé = false;
    while (!this.fin() && !trouvé)
      if (this.ptr_!.donnée === v) trouvé = true;
      else this.avancer();
  }
}

let liste = new ListeChaînée();
liste.ajouter(20);
liste.ajouter(40);
liste.ajouter(10);
liste.ajouterFin(100);
console.log(liste);

liste.affichage();
if(liste.recherche(20) == null) console.log("20 n'est pas dans la liste.");
else console.log("20 est dans la liste");

function somme_liste(liste: ListeChaînée): number{
  let somme = 0;
  let it = new ItérateurListeChaînée(liste);
  while(!it.fin()){
    somme += it.valeurCourante;
    it.avancer();
  }
  return somme;
}

console.log(somme_liste(liste));


