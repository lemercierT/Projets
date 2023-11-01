import { Maillon, ItérateurListeChaînée } from "./ListeChainee";

export class ListeChaînée {
    private tête_: Maillon | null = null; // Initialement la liste est vide
  
    get tête(): Maillon | null {
      return this.tête_;
    }
  
    estVide(): boolean {
      // La liste est vide ssi tête_ vaut null
      return this.tête_ === null;
    }
  
    ajouter(v: number): void {
      let nouveauMaillon = new Maillon(v, this.tête_);
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
  }