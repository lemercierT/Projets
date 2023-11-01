import { reverse_stringTab } from "./utils_ex1.ts";

const tab: Array<string> = ["premiere", "deuxieme", "troisieme", "quatrieme", "cinquieme"];
tab.forEach(value => {
    console.log(value);
})
console.log("\n");

tab.forEach((value, index) => {
    console.log("case ", index, ": ", value);
})
console.log("\n");
tab.forEach((value, index) => {
    value = value.toUpperCase();
    console.log("case ", index, ": ", value)
})

tab.forEach((value, index) => {
    let tab_div2 = Math.ceil(tab.length / 2);
    console.log(tab_div2)
    if(index < tab_div2){
        let temp = tab[tab.length - 1 - index];
        tab[tab.length - 1 - index] = tab[index];
        tab[index] = temp;
    }
})

console.log(tab);

tab.forEach(reverse_stringTab);
console.log(tab);

