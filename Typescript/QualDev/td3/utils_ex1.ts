export function reverse_stringTab(value: string, index: number, tab: Array<string>): void{
        if(index < tab.length / 2){
            let temp = tab[tab.length - 1 - index];
            tab[tab.length - 1 - index] = tab[index];
            tab[index] = temp;
        }
}
