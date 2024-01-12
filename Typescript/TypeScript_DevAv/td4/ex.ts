function countWord(chaine: string): Map<string, number>{
    let map = new Map<string, number>();
    for(let mot of chaine.split(" ")){
        if(map.has(mot)) map.set(mot, map.get(mot)! + 1)
        else map.set(mot, 1);
    }
    return map;
}

function countNumber(tab: Array<number>): boolean{
    let map = new Map<number, number>();
    for(let nbr of tab){
        if(map.has(nbr)) return true;
        else map.set(nbr, 1);
    }
    return false;

}

const chaine = "Ceci est une chaine et cette chaîne est constituée de dix mots.";
console.log(countWord(chaine));

const tab: Array<number> = [5, 10, 3, 5, 4, 8];
console.log(countNumber(tab));

let mémoire = new Map<number, number>();
mémoire.set(0, 0);
mémoire.set(1, 1);

function fibonaccci(n: number, memoire: Map<number, number>): number {
    if(memoire.has(n)) return memoire.get(n)!;
    else{
        let res = fibonaccci(n - 1, memoire) + fibonaccci(n - 2, memoire);
        memoire.set(n, res);
        return res;
    }

  }

function fibonacci(n: number): number {
  if(n == 0 || n == 1) return n;
  else if(n > 1) return fibonacci(n - 1) + fibonacci(n - 2);
  else throw new Error("negatif");
}

function ackerman(m: number, n: number, memoire: Map<string, number>): void{
    if(m === 0) n + 1;
}

console.log("avec mémo: \n", fibonaccci(100, mémoire));
console.log("sans mémo: \n", fibonacci(100));

